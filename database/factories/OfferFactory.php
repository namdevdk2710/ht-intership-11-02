<?php
use Faker\Generator as Faker;
use App\Models\Offer;
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
$factory->define(Offer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->text,
        'image' => $faker->image('public/uploads/images/offers',800,300, null, false),
    ];
});
