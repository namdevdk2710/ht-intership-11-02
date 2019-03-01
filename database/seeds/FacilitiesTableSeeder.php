<?php

use Illuminate\Database\Seeder;
use App\Models\Facilitie;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Facilitie::class, 5)->create();
    }
}
