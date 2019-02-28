<?php
use Faker\Generator as Faker;
use App\Models\About;
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
$factory->define(About::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'content' => $faker->text,
        'slug' => $faker->slug,
        'image' => $faker->image('public/uploads/images/abouts',750,500, null, false),
    ];
});
