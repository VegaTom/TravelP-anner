<?php

namespace TravelPlanner\Observers;

use TravelPlanner\Models\Trip;
use Uuid;

class TripObserver
{
    /**
     * Listen to the Trip creating event.
     *
     * @param  Trip  $trip
     * @return void
     */
    public function creating(Trip $trip)
    {
        $trip->id = Uuid::generate(4)->string;
    }

    /**
     * Listen to the Trip created event.
     *
     * @param  Trip  $trip
     * @return void
     */
    public function created(Trip $trip)
    {

    }

    /**
     * Listen to the Trip updated event.
     *
     * @param  Trip  $trip
     * @return void
     */
    public function updated(Trip $trip)
    {

    }

    /**
     * Listen to the Trip deleted event.
     *
     * @param  Trip  $trip
     * @return void
     */
    public function deleted(Trip $trip)
    {

    }

}
