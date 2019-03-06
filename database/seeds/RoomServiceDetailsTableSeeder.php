<?php

use Illuminate\Database\Seeder;
use App\Models\RoomServiceDetail;

class RoomServiceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RoomServiceDetail::class, 20)->create();
    }
}
