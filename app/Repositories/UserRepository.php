<?php

namespace TravelPlanner\Repositories;

use Illuminate\Http\Request;
use TravelPlanner\Extensions\Interfaces\Repositories\UserRepositoryInterface;
use TravelPlanner\Models\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    // This is where the "magic" comes from:
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    // This class only implements methods specific to the UserRepository
    public function getAllSortedByName()
    {
        return $this->model->orderBy('name')->get();
    }

    public function toggleAdminRole(User $user)
    {
        $user->toggleAdminRole();
        return $user;
    }

    public function getTrips(User $user, Request $request)
    {
        return $user->trips()
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
