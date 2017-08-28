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

    /**
     * Get all Users
     *
     * Gets all the users.
     **/
    public function getAllSortedByName();

    /**
     * Toggle admin role
     *
     * Toggles the admin role over the given user.
     **/
    public function toggleAdminRole(User $user);

    /**
     * Get Trips
     *
     * Gets all the trips on storage for the given user.
     * May be filtered by destination, start_date and/or end_date.
     **/
    public function getTrips(User $user, Request $request);

}
