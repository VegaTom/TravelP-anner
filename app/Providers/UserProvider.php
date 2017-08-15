<?php

namespace TravelPlanner\Providers;

use Illuminate\Support\ServiceProvider;
use TravelPlanner\Models\User;
use TravelPlanner\Observers\UserObserver;

class UserProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {}
}
