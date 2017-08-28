<?php

namespace TravelPlanner\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use TravelPlanner\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can index the users.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @param  \TravelPlanner\Models\User  $targetUser
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @param  \TravelPlanner\Models\User  $targetUser
     * @return mixed
     */
    public function view(User $user, User $targetUser)
    {
        return $targetUser->id == $user->id || $user->is_admin;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @param  \TravelPlanner\Models\User  $targetUser
     * @return mixed
     */
    public function update(User $user, User $targetUser)
    {
        return $targetUser->id == $user->id || $user->is_admin;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \TravelPlanner\Models\User  $user
     * @param  \TravelPlanner\Models\User  $targetUser
     * @return mixed
     */
    public function delete(User $user, User $targetUser)
    {
        return $user->is_admin;
    }
}
