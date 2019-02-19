<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 10; $i < 20; $i++) {
            DB::table('banners')->insert([
                'name' => 'Banner ' . $i,
                'image' => '/frontend/images/UploadImages/banners/Amarin_banner_hompage_1600x1200_P1.jpg',
                'slug' => '/accommodation',
                'link' => '/accommodation',
            ]);
        }
    }
}
