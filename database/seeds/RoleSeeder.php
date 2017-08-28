<?php

use Illuminate\Database\Seeder;
use TravelPlanner\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'admin',
                'level' => 1,
            ], [
                'name' => 'user',
                'level' => 2,
            ],
        ])->each(function ($role) {
            Role::create($role);
        });
    }
}
