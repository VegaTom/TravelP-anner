<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Register Test Case.
     *
     * @return void
     */
    public function testRegiester()
    {
        $data = [
            'email' => 'test@travelplanner.com',
            'name' => 'Test User',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ];
        $this->postJson('register', collect($data)->only('email', 'password')->toArray())
            ->assertStatus(422)
            ->assertJsonStructure(['name', 'password', 'password_confirmation']);

        $this->postJson('register', $data)
            ->assertStatus(201)
            ->assertJsonStructure(['data' => ['id', 'email', 'name'], 'meta' => ['token']]);
    }
}
