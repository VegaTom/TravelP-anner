<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Assert as PHPUnit;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseTransactions;
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

        $this->postJson('authenticate', collect($data)->only('email')->toArray())
            ->assertStatus(422)
            ->assertJsonStructure(['password']);

        $this->postJson('authenticate', collect($data)->only('password')->toArray())
            ->assertStatus(422)
            ->assertJsonStructure(['email']);

        $token = $this->postJson('authenticate', $data)
            ->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'email', 'name', 'roles'], 'meta' => ['token']])
            ->decodeResponseJson()['meta']['token'];

        $this->getJson('authenticate', [])
            ->assertStatus(500)
            ->assertSee('The token could not be parsed from the request');

        $this->getJson('authenticate', ['Authorization' => "Bearer not.a.valid.token"])
            ->assertStatus(400)
            ->assertJson(['token_invalid']);

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
}
