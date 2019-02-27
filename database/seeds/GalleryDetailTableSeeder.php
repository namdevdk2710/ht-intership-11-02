<?php

use Illuminate\Database\Seeder;
use App\Models\GalleryDetail;

class GalleryDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GalleryDetail::class, 20)->create();
    }
}
