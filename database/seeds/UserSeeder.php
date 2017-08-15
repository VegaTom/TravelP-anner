<?php

use Illuminate\Database\Seeder;
use TravelPlanner\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            User::create([
                'email' => 'admin@travelplanner.com',
                'password' => 'secret',
                'name' => 'Travel Planner Admin',
            ])
                ->setAdminRole(false)
                ->setUserRole(false);

            factory(User::class, 5)->create()->each->setUserRole(false);
        });
    }
}
