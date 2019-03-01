<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TodosTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(GallerysTableSeeder::class);
        $this->call(GalleryDetailsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(CuisinesTableSeeder::class);
        $this->call(CuisineDetailsTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(IntroducesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(OffersTableSeeder::class);
    }
}
