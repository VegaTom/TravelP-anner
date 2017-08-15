<?php

namespace TravelPlanner\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use TravelPlanner\Models\Trip;
use TravelPlanner\Models\User;

class TripPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the Trip.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @param  \TravelPlanner\Trip  $trip
     * @return mixed
     */
    public function view(User $user, Trip $trip)
    {
        return $trip->user->id == $user->id || $user->is_admin;
    }

    /**
     * Determine whether the user can create Trips.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $true;
    }

    /**
     * Determine whether the user can update the Trip.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @param  \TravelPlanner\Trip  $trip
     * @return mixed
     */
    public function update(User $user, Trip $trip)
    {
        return $trip->user->id == $user->id || $user->is_admin;
    }

    /**
     * Determine whether the user can delete the Trip.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @param  \TravelPlanner\Trip  $trip
     * @return mixed
     */
    public function delete(User $user, Trip $trip)
    {
        return $trip->user->id == $user->id || $user->is_admin;
    }
}
