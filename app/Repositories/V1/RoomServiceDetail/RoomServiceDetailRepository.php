<?php

namespace App\Repositories\V1\RoomServiceDetail;

use App\Repositories\BaseRepository;
use App\Models\RoomServiceDetail;
use Illuminate\Support\Facades\DB;

class RoomServiceDetailRepository extends BaseRepository implements RoomServiceDetailRepositoryInterface
{
    public function getModel()
    {
        return RoomServiceDetail::class;
    }

    public function storeRoomServiceDetail($idRoom, $data)
    {
        foreach ($data['room-service'] as $key => $dt) {
            $dataDetail = [
                'room_id' => $idRoom,
                'room_service_id' => $dt,
            ];
            $this->model->create($dataDetail);
        }

        return ;
    }
}
