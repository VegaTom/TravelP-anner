<?php

namespace TravelPlanner\Http\Controllers;

use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Http\Request;
use TravelPlanner\Http\Requests\Route\UpdateRequest;
use TravelPlanner\Models\Role;
use TravelPlanner\Models\Route;
use TravelPlanner\Repositories\RouteRepository;
use TravelPlanner\Transformers\RouteTransformer;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1/routes",
 *   @SWG\Info(
 *     title="Web routes API",
 *     version="1.0.0"
 *   )
 * )
 *
 * @resource Routes
 *
 * Allowed actions for Routes.
 */
class RouteController extends Controller
{
    /**
     * @param RouteRepository
     */
    public function __construct(RouteRepository $routeRepository, Response $response)
    {
        $this->routes = $routeRepository;
        $this->response = $response;
    }

    /**
     * Get all Routes
     *
     * Gets all the routes.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *   path="/",
     *   summary="Gets all the routes",
     *   operationId="index",
     *
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     */
    public function index()
    {
        $roles = Role::orderBy('level')->get()->map->transformToResponse();
        return $this->response->withCollection($this->routes->getAllSortedByName(), new RouteTransformer, null, null, compact('roles'));
    }

    /**
     * Toggle role permission
     *
     * Toggles the permission over the given role_id.
     *
     * @param  \Pasify\Http\Requests\Route\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @SWG\Put(
     *   path="/{routeId}/",
     *   summary="Toggles the permission over the given role_id",
     *   operationId="getCustomerRates",
     *   @SWG\Parameter(
     *     name="routeId",
     *     in="path",
     *     description="Target route.",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="role_id",
     *     in="formData",
     *     description="The role id to toggle permission on route.",
     *     required=true,
     *     type="string",
     *   ),
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     */
    public function update(UpdateRequest $request, $id)
    {
        $route = $this->routes->findOrFail($id);
        return $this->response->withArray($this->routes->toggleRole($route, $request->role_id));
    }

}
