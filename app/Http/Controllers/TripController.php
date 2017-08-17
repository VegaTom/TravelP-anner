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
     * Display a listing of the resource.
     *
     * @param  \TravelPlanner\Http\Requests\Trip\IndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        return $this->response->withCollection($this->trips->getAll($request), new TripTransformer);
    }

    /**
     * Store a new resource in storage.
     *
     * @param  \TravelPlanner\Http\Requests\Trip\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return $this->response->withItem($this->trips->create($request->only('destination', 'start_date', 'end_date', 'comment', 'user_id')), new TripTransformer);
    }

    /**
     * Display the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  \TravelPlanner\Http\Requests\Trip\UpdateRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $trip = $this->trips->findOrFail($id);
        return $this->response->withItem($this->trips->update($trip, $request->only('destination', 'start_date', 'end_date', 'comment')), new TripTransformer);
    }

    /**
     * Remove the specified resource from storage.
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
