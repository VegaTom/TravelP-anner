<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use TravelPlanner\Extensions\Traits\DoesLogins;
use TravelPlanner\Models\User;

class UserTest extends TestCase
{
    use DatabaseTransactions, DoesLogins;

    protected $url = 'api/v1/users';

    /**
     * Test get all users as user case.
     *
     * @return void
     */
    public function testAllUsersAsUser()
    {
        $this->getJson($this->url, $this->authUserHeader())
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }

    /**
     * Test get all users as admin case.
     *
     * @return void
     */
    public function testAllUsersAsAdmin()
    {
        $this->getJson($this->url, $this->authAdminHeader())
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'email',
                        'created_at',
                        'roles' => [
                            'data' => [
                                '*' => [
                                    'id',
                                    'name',
                                    'level',
                                ],
                            ],
                        ],
                    ],
                ],
            ]);
    }

    /**
     * Test show user as admin case.
     *
     * @return void
     */
    public function testShowUserAsAdmin()
    {
        $user = User::onlyUser()->inRandomOrder()->first();

        $this->getJson("{$this->url}/not-a-valid-id", $this->authAdminHeader())
            ->assertStatus(404)
            ->assertSeeText('The resource you have requested is not found');

        $this->getJson("{$this->url}/{$user->id}", $this->authAdminHeader())
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'roles' => [
                        'data' => [
                            '*' => [
                                'id',
                                'name',
                                'level',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    /**
     * Test show another user as user case.
     *
     * @return void
     */
    public function testShowAnotherUserAsUser()
    {
        $user = User::onlyUser()->inRandomOrder()->first();
        $targetUser = User::onlyUser()->where('id', '!=', $user->id)->inRandomOrder()->first();

        $this->getJson("{$this->url}/{$targetUser->id}", $this->authUserHeader($user))
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }

    /**
     * Test user info case.
     *
     * @return void
     */
    public function testShowUserInfo()
    {
        $user = User::onlyUser()->inRandomOrder()->first();
        $this->getJson("{$this->url}/{$user->id}", $this->authUserHeader($user))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'roles' => [
                        'data' => [
                            '*' => [
                                'id',
                                'name',
                                'level',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    /**
     * Test update user info with existing email case.
     *
     * @return void
     */
    public function testUpdateUserInfoWithExistingEmail()
    {
        $user = User::onlyUser()->inRandomOrder()->first();
        $this->putJson("{$this->url}/{$user->id}", ['email' => User::has('adminRole')->first()->email], $this->authUserHeader($user))
            ->assertStatus(422)
            ->assertJsonStructure(['email']);
    }

    /**
     * Test update user info case.
     *
     * @return void
     */
    public function testUpdateUserInfo()
    {
        $user = User::onlyUser()->inRandomOrder()->first();

        $this->putJson("{$this->url}/{$user->id}", ['name' => 'New name'], $this->authUserHeader($user))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'roles' => [
                        'data' => [
                            '*' => [
                                'id',
                                'name',
                                'level',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    /**
     * Test toggle admin role as user case.
     *
     * @return void
     */
    public function testToggleAdminRoleAsUser()
    {
        $user = User::onlyUser()->inRandomOrder()->first();
        $targetUser = User::onlyUser()->where('id', '!=', $user->id)->inRandomOrder()->first();

        $this->putJson("{$this->url}/{$targetUser->id}/admin", [], $this->authUserHeader($user))
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }

    /**
     * Test toggle admin role as admin case.
     *
     * @return void
     */
    public function testToggleAdminRoleAsAdmin()
    {
        $user = User::onlyUser()->inRandomOrder()->first();

        $this->putJson("{$this->url}/{$user->id}/admin", [], $this->authAdminHeader())
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'roles' => [
                        'data' => [
                            '*' => [
                                'id',
                                'name',
                                'level',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    /**
     * Test delete user as user case.
     *
     * @return void
     */
    public function testDeleteUserAsUser()
    {
        $user = User::onlyUser()->inRandomOrder()->first();
        $targetUser = User::onlyUser()->where('id', '!=', $user->id)->inRandomOrder()->first();

        $this->deleteJson("{$this->url}/{$targetUser->id}", [], $this->authUserHeader($user))
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }

    /**
     * Test delete user as admin case.
     *
     * @return void
     */
    public function testDeleteUserAsAdmin()
    {
        $user = User::onlyUser()->inRandomOrder()->first();

        $this->deleteJson("{$this->url}/{$user->id}", [], $this->authAdminHeader())
            ->assertStatus(204);
    }

}
