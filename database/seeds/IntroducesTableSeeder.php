<?php

use Illuminate\Database\Seeder;
use App\Models\Introduce;

class IntroducesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Introduce::class, 5)->create();
    }
}
