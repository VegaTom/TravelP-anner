<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Assert as PHPUnit;
use Tests\TestCase;
use TravelPlanner\Extensions\Traits\DoesLogins;

class LoginTest extends TestCase
{
    use DatabaseTransactions, DoesLogins;
    /**
     * Invalid login Test Case.
     *
     * @return void
     */
    public function testInvalidLogin()
    {
        $data = [
            'email' => 'admin@travelplanner.com',
            'password' => 'secret',
        ];

        $this->postJson('authenticate', collect($data)->only('email')->toArray())
            ->assertStatus(422)
            ->assertJsonStructure(['password']);

        $this->postJson('authenticate', collect($data)->only('password')->toArray())
            ->assertStatus(422)
            ->assertJsonStructure(['email']);
    }

    /**
     * Login Test Case.
     *
     * @return void
     */
    public function testLogin()
    {
        $data = [
            'email' => 'admin@travelplanner.com',
            'password' => 'secret',
        ];

        $this->postJson('authenticate', $data)
            ->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'email', 'name', 'roles'], 'meta' => ['token']]);
    }

    /**
     * Making Authenticated Requests Without Token Test Case.
     *
     * @return void
     */
    public function testMakingAuthRequestsNoToken()
    {

        $this->getJson('authenticate', [])
            ->assertStatus(400)
            ->assertJson(['error' => 'token_not_provided']);

        $this->getJson('authenticate', ['Authorization' => "Bearer invalid.token.345678"])
            ->assertStatus(400)
            ->assertJson(['error' => 'token_invalid']);

    }

    /**
     * Refresh Token Test Case.
     *
     * @return void
     */
    public function testRefreshToken()
    {
        $data = [
            'email' => 'admin@travelplanner.com',
            'password' => 'secret',
        ];

        $token = $this->postJson('authenticate', $data)
            ->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'email', 'name', 'roles'], 'meta' => ['token']])
            ->decodeResponseJson()['meta']['token'];

        $refreshedToken = $this->getJson('authenticate', ['Authorization' => "Bearer {$token}"])
            ->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'email', 'name', 'roles'], 'meta' => ['token']])
            ->decodeResponseJson()['meta']['token'];

        PHPUnit::assertTrue($token != $refreshedToken);

        $token = $this->postJson('authenticate', $data)
            ->decodeResponseJson()['meta']['token'];

        $this->deleteJson('authenticate', [], ['Authorization' => "Bearer {$token}"])
            ->assertStatus(204);
    }

    /**
     * Logout Token Test Case.
     *
     * @return void
     */
    public function testLogout()
    {
        $data = [
            'email' => 'admin@travelplanner.com',
            'password' => 'secret',
        ];

        $token = $this->loginAsAdmin();

        $this->deleteJson('authenticate', [], ['Authorization' => "Bearer {$token}"])
            ->assertStatus(204);
    }

}
