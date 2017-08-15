<?php

use Illuminate\Database\Seeder;
use TravelPlanner\Models\Role;
use TravelPlanner\Models\Route as RouteModel;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::pluck('id')->toArray();

        collect(Route::getRoutes()->get())->each(function ($route) use ($roles) {
            !empty($route->getname()) ? RouteModel::firstOrCreate(['name' => $route->getname()])->roles()->sync($roles) : null;
        });
    }
}
