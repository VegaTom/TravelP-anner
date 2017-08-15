<?php

namespace TravelPlanner\Repositories;

use Illuminate\Http\Request;
use TravelPlanner\Extensions\Interfaces\Repositories\TripRepositoryInterface;
use TravelPlanner\Models\Trip;

class TripRepository extends AbstractRepository implements TripRepositoryInterface
{
    // This is where the "magic" comes from:
    public function __construct(Trip $model)
    {
        $this->model = $model;
    }

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
}
