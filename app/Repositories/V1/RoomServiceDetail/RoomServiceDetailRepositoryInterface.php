<?php

namespace App\Repositories\V1\RoomServiceDetail;

interface RoomServiceDetailRepositoryInterface
{
    public function storeRoomServiceDetail($idRoom, $data);

    public function roomServices($id);
    public function initRoomServiceDetail($idRoom);

    public function updateRoomServiceDetail($idRoom, $data);
}
