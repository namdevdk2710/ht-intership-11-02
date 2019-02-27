<?php
use Faker\Generator as Faker;
use App\Models\GalleryDetail;
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
$factory->define(GalleryDetail::class, function (Faker $faker) {
    return [
        'gallery_id' => $faker->numberBetween(1, 4),
        'name' => $faker->name,
        'description' => $faker->text,
        'content' => $faker->text,
        'image' => $faker->image('public/uploads/images/gallerydetails',400,300, null, false),
    ];
});
