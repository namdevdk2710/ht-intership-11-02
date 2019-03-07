<?php

namespace App\Repositories\V1\Room;

interface RoomRepositoryInterface
{
    public function changestatus($data);

    public function detail($id);

    public function anotherRoom($id);
}
