<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(RouteSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TripSeeder::class);
    }
}
