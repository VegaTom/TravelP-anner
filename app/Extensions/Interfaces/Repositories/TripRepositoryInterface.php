<?php

namespace TravelPlanner\Extensions\Interfaces\Repositories;

use Illuminate\Http\Request;
use TravelPlanner\Models\Trip;

/**
 * The TripRepositoryInterface contains ONLY method signatures for methods
 * related to the Trip object.
 *
 * Note that we extend from RepositoryInterface, so any class that implements
 * this interface must also provide all the standard eloquent methods (find, all, etc.)
 */
interface TripRepositoryInterface extends RepositoryInterface
{

    /**
     * Get all Trips
     *
     * Gets all the trips on storage. May be filtered by destination,
     * start_date and/or end_date.
     **/
    public function getAll(Request $request);

    /**
     * Get Trip plan for next month
     *
     * Gets all the trips for the next month.
     **/
    public function nextMonth(Request $request);

}
