<?php

namespace TravelPlanner\Observers;

use TravelPlanner\Models\Route;
use Uuid;

class RouteObserver
{
    /**
     * Listen to the Route creating event.
     *
     * @param  Route  $route
     * @return void
     */
    public function creating(Route $route)
    {
        $route->id = Uuid::generate(4)->string;
    }

    /**
     * Listen to the Route created event.
     *
     * @param  Route  $route
     * @return void
     */
    public function created(Route $route)
    {

    }

    /**
     * Listen to the Route updated event.
     *
     * @param  Route  $route
     * @return void
     */
    public function updated(Route $route)
    {

    }

    /**
     * Listen to the Route deleted event.
     *
     * @param  Route  $route
     * @return void
     */
    public function deleted(Route $route)
    {

    }

}
