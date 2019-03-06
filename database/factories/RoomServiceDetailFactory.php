<?php
use Faker\Generator as Faker;
use App\Models\RoomServiceDetail;
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
$factory->define(RoomServiceDetail::class, function (Faker $faker) {
    return [
        'room_id' => $faker->numberBetween(1, 4),
        'room_service_id' => $faker->numberBetween(1, 4),
    ];
});
