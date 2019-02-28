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
<<<<<<< HEAD
        $this->call(CuisineDetailsTableSeeder::class);
=======
        $this->call(AboutsTableSeeder::class);
>>>>>>> 8e3cb4be999c7a179748eb72365f25f778bdb0fa
    }
}
