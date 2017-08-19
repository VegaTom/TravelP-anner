<?php
namespace TravelPlanner\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class CustomValidationRulesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('actualPassword', 'TravelPlanner\Extensions\Validation\CustomValidator@validateActualPassword');

        Validator::extend('hasNoRecoveryRequest', 'TravelPlanner\Extensions\Validation\CustomValidator@validateHasNoRecoveryRequest');
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
