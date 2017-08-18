<?php

namespace TravelPlanner\Http\Controllers;

use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Http\Request;
use TravelPlanner\Http\Requests\User\DeleteRequest;
use TravelPlanner\Http\Requests\User\IndexRequest;
use TravelPlanner\Http\Requests\User\ShowRequest;
use TravelPlanner\Http\Requests\User\ToggleAdminRequest;
use TravelPlanner\Http\Requests\User\TripsRequest;
use TravelPlanner\Http\Requests\User\UpdateRequest;
use TravelPlanner\Models\User;
use TravelPlanner\Repositories\UserRepository;
use TravelPlanner\Transformers\TripTransformer;
use TravelPlanner\Transformers\UserTransformer;

class UserController extends Controller
{
    /**
     * @param UserRepository
     */
    public function __construct(UserRepository $userRepository, Response $response)
    {
        $this->users = $userRepository;
        $this->response = $response;
    }

    /**
     * Get all Users
     *
     * Gets all the users.
     *
     * @param  \TravelPlanner\Http\Requests\User\IndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        return $this->response->withCollection($this->users->getAllSortedByName(), new UserTransformer);
    }

    /**
     * Show the Users
     *
     * Shows the specified user.
     *
     * @param  \TravelPlanner\Http\Requests\User\ShowRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request, $id)
    {
        return $this->response->withItem($this->users->findOrFail($id), new UserTransformer);
    }

    /**
     * Update the Users
     *
     * Updates the specified user.
     *
     * @param  \TravelPlanner\Http\Requests\User\UpdateRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        return $this->response->withItem($this->users->update($user,
            collect($request->toArray())->only('name', 'email')->toArray()
        ), new UserTransformer);
    }

    /**
     * Toggle admin role
     *
     * Toggles the admin role over the given user.
     *
     * @param  \TravelPlanner\Http\Requests\User\ToggleAdminRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleAdminRole(ToggleAdminRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        return $this->response->withItem($this->users->toggleAdminRole($user), new UserTransformer);
    }

    /**
     * Delete the Users
     *
     * Deletes the specified user.
     *
     * @param  \TravelPlanner\Http\Requests\User\DeleteRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        if ($this->users->delete($user)) {
            return $this->response->withArray([])->setStatusCode(204);
        }
        return $this->response->errorInternalError(__('general.errors.deleting.user'));
    }

    /**
     * Get Trips
     *
     * Gets all the trips on storage for the given user.
     * May be filtered by destination, start_date and/or end_date.
     *
     * @param  \TravelPlanner\Http\Requests\User\TripsRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getTrips(TripsRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        return $this->response->withCollection($this->users->getTrips($user, $request), new TripTransformer);
    }
}
