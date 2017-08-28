<?php

namespace TravelPlanner\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \TravelPlanner\Events\PasswordRecoveryEvent::class => [
            \TravelPlanner\Listeners\PasswordRecoveryListener::class,
        ],
        \TravelPlanner\Events\PasswordRecoveryRequestEvent::class => [
            \TravelPlanner\Listeners\PasswordRecoveryRequestListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
