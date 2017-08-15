<?php
namespace TravelPlanner\Transformers;

use League\Fractal;
use TravelPlanner\Models\Route;

class RouteTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'permissions',
    ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Route $route)
    {
        return [
            'id' => $route->id,
            'name' => $route->name,
        ];
    }

    /**
     * Include Permissions
     *
     * @param Route $route
     * @return League\Fractal\Resource\Collection
     */
    public function includePermissions(Route $route)
    {
        $permissions = $route->roles()->orderBy('level')->get();

        return $this->collection($permissions, new RoleTransformer);
    }
}
