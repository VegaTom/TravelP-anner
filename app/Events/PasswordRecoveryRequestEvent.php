<?php

namespace TravelPlanner\Events;

use Illuminate\Queue\SerializesModels;
use TravelPlanner\Models\User;

class PasswordRecoveryRequestEvent
{
    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
