<?php

use Illuminate\Database\Seeder;
use App\Models\RoomService;

class RoomServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RoomService::class, 20)->create();
    }
}
