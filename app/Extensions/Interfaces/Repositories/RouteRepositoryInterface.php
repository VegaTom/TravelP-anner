<?php

namespace TravelPlanner\Extensions\Interfaces\Repositories;

use TravelPlanner\Models\Route;

/**
 * The RouteRepositoryInterface contains ONLY method signatures for methods
 * related to the Route object.
 *
 * Note that we extend from RepositoryInterface, so any class that implements
 * this interface must also provide all the standard eloquent methods (find, all, etc.)
 */
interface RouteRepositoryInterface extends RepositoryInterface
{

    public function getAllSortedByName();

    public function toggleRole(Route $route, $role);

}
