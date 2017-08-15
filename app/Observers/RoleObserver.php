<?php

namespace TravelPlanner\Observers;

use TravelPlanner\Models\Role;
use Uuid;

class RoleObserver
{
    /**
     * Listen to the Role creating event.
     *
     * @param  Role  $role
     * @return void
     */
    public function creating(Role $role)
    {
        $role->id = Uuid::generate(4)->string;
    }

    /**
     * Listen to the Role created event.
     *
     * @param  Role  $role
     * @return void
     */
    public function created(Role $role)
    {

    }

    /**
     * Listen to the Role updated event.
     *
     * @param  Role  $role
     * @return void
     */
    public function updated(Role $role)
    {

    }

    /**
     * Listen to the Role deleted event.
     *
     * @param  Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {

    }

}
