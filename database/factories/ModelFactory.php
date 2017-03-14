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

$factory->define(App\Route::class, function (Faker\Generator $faker) {
    return [
        'route_id' => mt_rand(1, 100) . '-256',
        'route_short_name' => (string) mt_rand(1, 300),
        'route_long_name' => $faker->name,
        'route_desc' => $faker->sentence,
        'route_type' => '3',
        'route_url' => $faker->url
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Trip::class, function (Faker\Generator $faker) {
    return [
        'route_id' => uniqid(),
        'service_id' => uniqid(),
        'trip_id' => uniqid(),
        'trip_headsign' => $faker->name,
        'direction_id' => (string) mt_rand(0, 1),
        'block_id' => (string) mt_rand(0, 3000)
    ];
});
