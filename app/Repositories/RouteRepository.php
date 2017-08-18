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

    /**
     * Get all Routes
     *
     * Gets all the routes.
     **/
    public function getAllSortedByName()
    {
        return $this->model->orderBy('name')->get();
    }

    /**
     * Toggle role permission
     *
     * Toggles the permission over the given role_id.
     **/
    public function toggleRole(Route $route, $role)
    {
        return DB::transaction(function () use ($route, $role) {
            return $route->roles()->toggle($role);
        });
    }
}
