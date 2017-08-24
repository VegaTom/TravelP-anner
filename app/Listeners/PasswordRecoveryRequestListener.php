<?php

namespace TravelPlanner\Listeners;

use TravelPlanner\Events\PasswordRecoveryRequestEvent;
use TravelPlanner\Models\User;
use TravelPlanner\Notifications\PasswordRecoveryRequestNotification;
use Uuid;

class PasswordRecoveryRequestListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PasswordRecoveryRequestEvent  $event
     * @return void
     */
    public function handle(PasswordRecoveryRequestEvent $event)
    {
        $event->user->password_recovery_token = Uuid::generate(4)->string;
        $event->user->save();
        $event->user->notify(new PasswordRecoveryRequestNotification());
    }
}
