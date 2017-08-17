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
     * Display a listing of the resource.
     *
     * @param  \TravelPlanner\Http\Requests\User\IndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        return $this->response->withCollection($this->users->getAllSortedByName(), new UserTransformer);
    }

    /**
     * Display the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  \TravelPlanner\Http\Requests\User\UpdateRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = $this->users->findOrFail($id);
        return $this->response->withItem($this->users->update($user, $request->only('name', 'email')), new UserTransformer);
    }

    /**
     * Toggle the Admin Role.
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
     * Remove the specified resource from storage.
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
     * Get the travels for given user.
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
