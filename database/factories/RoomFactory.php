<?php
use Faker\Generator as Faker;
use App\Models\Room;
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
$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'content' => $faker->text,
        'image' => $faker->image('public/uploads/images/rooms',1000,1000, null, false),
        'price' => $faker->randomFloat(3, 0, 1000),
        'discount' => $faker->randomFloat(3, 0, 1000),
        'amount' => $faker->numberBetween(1, 5),
        'area' => $faker->text,
        'slug' => $faker->slug,
    ];
});
