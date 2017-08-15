<?php

namespace TravelPlanner\Extensions\Interfaces\Repositories;

use Illuminate\Http\Request;
use TravelPlanner\Models\User;

/**
 * The UserRepositoryInterface contains ONLY method signatures for methods
 * related to the User object.
 *
 * Note that we extend from RepositoryInterface, so any class that implements
 * this interface must also provide all the standard eloquent methods (find, all, etc.)
 */
interface UserRepositoryInterface extends RepositoryInterface
{

    public function getAllSortedByName();

    public function toggleAdminRole(User $user);

    public function getTrips(User $user, Request $request);

}
