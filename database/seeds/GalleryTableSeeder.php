<?php

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gallery::class, 20)->create();
    }
}
