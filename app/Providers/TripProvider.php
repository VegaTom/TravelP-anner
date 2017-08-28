<?php

namespace TravelPlanner\Providers;

use Illuminate\Support\ServiceProvider;

class TripProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \TravelPlanner\Models\Trip::observe(\TravelPlanner\Observers\TripObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
