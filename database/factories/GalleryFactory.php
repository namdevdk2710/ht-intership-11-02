<?php

use Faker\Generator as Faker;
use App\Models\Gallery;
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

$factory->define(Gallery::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'image' => $faker->image('public/uploads/images/gallerys',800,800, null, false),
    ];
});
