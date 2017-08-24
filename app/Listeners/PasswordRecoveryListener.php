<?php

namespace TravelPlanner\Listeners;

use TravelPlanner\Events\PasswordRecoveryEvent;
use TravelPlanner\Models\User;
use TravelPlanner\Notifications\PasswordRecoveryNotification;

class PasswordRecoveryListener
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
     * @param  PasswordRecoveryEvent  $event
     * @return void
     */
    public function handle(PasswordRecoveryEvent $event)
    {
        $event->user->password_recovery_token = null;
        $password = str_random(10);
        $event->user->password = bcrypt($password);
        $event->user->save();
        $event->user->notify(new PasswordRecoveryNotification($password));
    }
}
