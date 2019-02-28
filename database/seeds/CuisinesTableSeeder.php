<?php

use Illuminate\Database\Seeder;
use App\Models\Cuisine;

class CuisinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cuisine::class, 5)->create();
    }
}
