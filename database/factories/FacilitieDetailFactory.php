<?php
use Faker\Generator as Faker;
use App\Models\FacilitieDetail;
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
$factory->define(FacilitieDetail::class, function (Faker $faker) {
    return [
        'facilitie_id' => $faker->numberBetween(1, 5),
        'name' => $faker->name,
        'description' => $faker->text,
        'content' => $faker->text,
        'price' => $faker->randomFloat(3, 0, 1000),
        'image' => $faker->image('public/uploads/images/facilitiedetails',750,430, null, false),
    ];
});
