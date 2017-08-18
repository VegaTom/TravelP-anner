<?php

namespace TravelPlanner\Extensions\Traits;

use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use TravelPlanner\Models\User;

/**
 * Emulates logins
 */
trait DoesLogins
{
    use MakesHttpRequests;

    public function authAdminHeader()
    {
        return [
            'Authorization' => 'Bearer ' . $this->loginAsAdmin(),
        ];
    }

    public function authUserHeader(User $user = null)
    {
        return [
            'Authorization' => 'Bearer ' . $this->loginAsUser($user),
        ];
    }

    /**
     * Login as Admin
     *
     * @return token
     */
    public function loginAsAdmin()
    {
        $data = [
            'email' => User::has('adminRole')->first()->email,
            'password' => 'secret',
        ];

        return $this->postJson('authenticate', $data)
            ->decodeResponseJson()['meta']['token'];
    }

    /**
     * Login as User
     *
     * @return token
     */
    public function loginAsUser(User $user = null)
    {
        $data = [
            'email' => ($user ?? User::has('userRole')->doesntHave('adminRole')->inRandomOrder()->first())->email,
            'password' => 'secret',
        ];

        return $this->postJson('authenticate', $data)
            ->decodeResponseJson()['meta']['token'];
    }
}
