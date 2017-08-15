<?php

use Illuminate\Database\Seeder;
use TravelPlanner\Models\Trip;
use TravelPlanner\Models\User;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::get()->each(function ($user) {
            $user->trips()->saveMany(factory(Trip::class, 5)->make());
        });
    }
}
