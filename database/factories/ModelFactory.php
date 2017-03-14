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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

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
