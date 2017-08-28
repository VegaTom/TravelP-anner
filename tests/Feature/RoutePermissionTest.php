<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use TravelPlanner\Extensions\Traits\DoesLogins;
use TravelPlanner\Models\Role;
use TravelPlanner\Models\Route;

class RoutePermissionTest extends TestCase
{
    use DatabaseTransactions, DoesLogins;

    protected $url = 'api/v1/routes';

    /**
     * Test route index case.
     *
     * @return void
     */
    public function testRouteIndex()
    {
        $this->getJson($this->url, $this->authAdminHeader())
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'permissions' => [
                            'data' => [
                                '*' => [
                                    'id', 'name', 'level',
                                ],
                            ],
                        ],
                    ],
                ],
                'meta' => [
                    'roles' => [
                        '*' => ['id', 'name', 'level'],
                    ],
                ],
            ]);
    }

    /**
     * Test route permission update as admin case.
     *
     * @return void
     */
    public function testRoutePermissionUpdateAsAdmin()
    {
        $id = Route::whereName('api.v1.routes.roles')->first()->id;
        $role_id = Role::user()->id;

        $this->putJson("{$this->url}/{$id}", [], $this->authAdminHeader())
            ->assertStatus(422)
            ->assertJsonStructure(['role_id']);

        $this->putJson("{$this->url}/{$id}", ['role_id' => $role_id], $this->authAdminHeader())
            ->assertStatus(200)
            ->assertJsonStructure(['attached', 'detached']);
    }

    /**
     * Test route permission update as user case.
     *
     * @return void
     */
    public function testRoutePermissionUpdateAsUser()
    {
        $id = Route::whereName('api.v1.routes.roles')->first()->id;
        $role_id = Role::user()->id;

        $this->putJson("{$this->url}/{$id}", [], $this->authUserHeader())
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }
}
