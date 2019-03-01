<?php

use Illuminate\Database\Seeder;
use App\Models\FacilitieDetail;

class FacilitieDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FacilitieDetail::class, 20)->create();
    }
}
