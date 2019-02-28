<?php

use Illuminate\Database\Seeder;
use App\Models\CuisineDetail;

class CuisineDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CuisineDetail::class, 20)->create();
    }
}
