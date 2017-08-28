<?php

namespace TravelPlanner\Http\Controllers;

use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Http\Request;
use TravelPlanner\Http\Requests\Trip\DeleteRequest;
use TravelPlanner\Http\Requests\Trip\IndexRequest;
use TravelPlanner\Http\Requests\Trip\ShowRequest;
use TravelPlanner\Http\Requests\Trip\StoreRequest;
use TravelPlanner\Http\Requests\Trip\UpdateRequest;
use TravelPlanner\Models\Trip;
use TravelPlanner\Repositories\TripRepository;
use TravelPlanner\Transformers\TripTransformer;

/**
 * @resource Trips
 *
 * Allowed actions for Trips.
 */
class TripController extends Controller
{
    /**
     * @param TripRepository
     */
    public function __construct(TripRepository $tripRepository, Response $response)
    {
        $this->trips = $tripRepository;
        $this->response = $response;
    }

    /**
     * Get all Trips
     *
     * Gets all the trips on storage. May be filtered by destination,
     * start_date and/or end_date.
     *
     * @param  \TravelPlanner\Http\Requests\Trip\IndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        return $this->response->withCollection($this->trips->getAll($request), new TripTransformer);
    }

    /**
     * Get Trip plan for next month
     *
     * Gets all the trips for the next month.
     *
     * @return \Illuminate\Http\Response
     */
    public function nextMonth(Request $request)
    {
        return $this->response->withCollection($this->trips->nextMonth($request), new TripTransformer);
    }

    /**
     * Creates a new Trip
     *
     * If there is no given user_id then the trip will be
     * assigned to the logged user.
     *
     * @param  \TravelPlanner\Http\Requests\Trip\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return $this->response->withItem($this->trips->create($request->only('destination', 'start_date', 'end_date', 'comment', 'user_id')), new TripTransformer)->setStatusCode(201);
    }

    /**
     * Show the trip.
     *
     * Shows the given trip.
     *
     * @param  \TravelPlanner\Http\Requests\Trip\ShowRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request, $id)
    {
        return $this->response->withItem($this->trips->findOrFail($id), new TripTransformer);
    }

    /**
     * Update the trip.
     *
     * Updates the given trip.
     *
     * @param  \TravelPlanner\Http\Requests\Trip\UpdateRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $trip = $this->trips->findOrFail($id);
        return $this->response->withItem($this->trips->update($trip,
            collect($request->toArray())->only('destination', 'start_date', 'end_date', 'comment')->toArray()
        ), new TripTransformer);
    }

    /**
     * Delete the trip.
     *
     * Deletes the given trip.
     *
     * @param  \TravelPlanner\Http\Requests\Trip\DeleteRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, $id)
    {
        $trip = $this->trips->findOrFail($id);
        if ($this->trips->delete($trip)) {
            return $this->response->withArray([])->setStatusCode(204);
        }
        return $this->response->errorInternalError(__('general.errors.deleting.trip'));
    }
}
