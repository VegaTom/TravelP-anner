<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(TravelPlanner\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});

$factory->define(TravelPlanner\Models\Trip::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'destination' => $faker->city,
        'start_date' => \Carbon\Carbon::now()->addDays(random_int(1, 4))->toW3cString(),
        'end_date' => \Carbon\Carbon::now()->addDays(5)->toW3cString(),
        'comment' => rand(0, 1) ? $faker->realText(20) : null,
    ];
});
