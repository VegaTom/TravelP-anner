<?php
namespace TravelPlanner\Transformers;

use League\Fractal;
use TravelPlanner\Models\User;

class UserTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'roles',
    ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at->toW3cString(),
        ];
    }

    /**
     * Include Roles
     *
     * @param User $user
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRoles(User $user)
    {
        $roles = $user->roles;
        return $this->collection($roles, new RoleTransformer);
    }
}
