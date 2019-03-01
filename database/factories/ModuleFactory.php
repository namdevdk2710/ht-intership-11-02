<?php
use Faker\Generator as Faker;
use App\Models\Module;
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
$factory->define(Module::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'slug' => $faker->slug,
        'image' => $faker->image('public/uploads/images/modules',1600,600, null, false),
    ];
});
