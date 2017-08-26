<?php

namespace TravelPlanner\Repositories;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Request as RequestFacade;
use TravelPlanner\Extensions\Interfaces\Repositories\TripRepositoryInterface;
use TravelPlanner\Models\Trip;

class TripRepository extends AbstractRepository implements TripRepositoryInterface
{
    // This is where the "magic" comes from:
    public function __construct(Trip $model)
    {
        $this->model = $model;
    }

    /**
     * Get all Trips
     *
     * Gets all the trips on storage. May be filtered by destination,
     * start_date and/or end_date.
     **/
    public function getAll(Request $request)
    {
        return $this->model
            ->orderBy('start_date')->orderBy('end_date')->orderBy('destination')
            ->when(!empty($request->destination), function ($q) use ($request) {
                return $q->where('destination', 'like', "%{$request->destination}%");
            })
            ->when(!empty($request->start_date), function ($q) use ($request) {
                return $q->where('start_date', '>=', Carbon::createFromFormat('Y-m-d\TH:i:sP', $request->start_date)->setTimezone('UTC'));
            })
            ->when(!empty($request->end_date), function ($q) use ($request) {
                return $q->where('end_date', '<=', Carbon::createFromFormat('Y-m-d\TH:i:sP', $request->end_date)->setTimezone('UTC'));
            })
            ->get();
    }

    /**
     * Get Trip plan for next month
     *
     * Gets all the trips for the next month.
     **/
    public function nextMonth()
    {
        return RequestFacade::user()->trips()
            ->orderBy('start_date')->orderBy('end_date')->orderBy('destination')
            ->where('start_date', '>=', Carbon::now()->modify('first day of next month')->startOfDay())
            ->get();
    }

    /**
     * Creates a new Trip
     *
     * If there is no given user_id then the trip will be
     * assigned to the logged user.
     **/
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            if (empty($attributes['user_id'])) {
                return \Request::user()->trips()->create($attributes);
            }
            return $this->model->create($attributes);
        });
    }
}
