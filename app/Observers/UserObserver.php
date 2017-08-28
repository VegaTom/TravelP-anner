<?php

namespace TravelPlanner\Observers;

use TravelPlanner\Models\User;
use Uuid;

class UserObserver
{
    /**
     * Listen to the User creating event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->id = Uuid::generate(4)->string;
    }

    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {

    }

    /**
     * Listen to the User updated event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(User $user)
    {

    }

    /**
     * Listen to the User deleted event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleted(User $user)
    {

    }

}
