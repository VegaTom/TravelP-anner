<?php
namespace TravelPlanner\Transformers;

use League\Fractal;
use TravelPlanner\Models\Role;

class RoleTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            'id' => $role->id,
            'name' => __("general.roles.{$role->name}"),
            'level' => $role->level,
        ];
    }
}
