<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Invañod register Test Case.
     *
     * @return void
     */
    public function testInvalidRegister()
    {
        $data = [
            'email' => 'test@travelplanner.com',
            'password' => 'secret',
        ];
        $this->postJson('register', $data)
            ->assertStatus(422)
            ->assertJsonStructure(['name', 'password', 'password_confirmation']);
    }

    /**
     * Valid register Test Case.
     *
     * @return void
     */
    public function testValidRegister()
    {
        $data = [
            'email' => 'test@travelplanner.com',
            'name' => 'Test User',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ];

        $this->postJson('register', $data)
            ->assertStatus(201)
            ->assertJsonStructure(['data' => ['id', 'email', 'name'], 'meta' => ['token']]);
    }
}
