<?php

namespace App\Repositories\V1\RoomServiceDetail;

interface RoomServiceDetailRepositoryInterface
{
    public function storeRoomServiceDetail($idRoom, $data);

    public function initRoomServiceDetail($idRoom);

    public function updateRoomServiceDetail($idRoom, $data);
}
