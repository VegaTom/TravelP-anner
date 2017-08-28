<?php

namespace TravelPlanner\Providers;

use Illuminate\Support\ServiceProvider;

class RouteProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \TravelPlanner\Models\Route::observe(\TravelPlanner\Observers\RouteObserver::class);
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
