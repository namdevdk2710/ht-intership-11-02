<?php

use Faker\Generator as Faker;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'password' => bcrypt('123'),
        'phone' => '09052244' . $faker->numberBetween(10, 99),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'address' => $faker->address,
        'avatar' => $faker->image('public/uploads/images/users',400,300, null, false),
        'remember_token' => str_random(10),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
