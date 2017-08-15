<?php

namespace TravelPlanner\Repositories;

use DB;
use TravelPlanner\Extensions\Interfaces\Repositories\RouteRepositoryInterface;
use TravelPlanner\Models\Route;

class RouteRepository extends AbstractRepository implements RouteRepositoryInterface
{
    // This is where the "magic" comes from:
    public function __construct(Route $model)
    {
        $this->model = $model;
    }

    // This class only implements methods specific to the UserRepository

    public function getAllSortedByName()
    {
        return $this->model->orderBy('name')->get();
    }

    public function toggleRole(Route $route, $role)
    {
        return DB::transaction(function () use ($route, $role) {
            return $route->roles()->toggle($role);
        });
    }
}
