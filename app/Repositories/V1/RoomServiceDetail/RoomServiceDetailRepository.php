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

    public function initRoomServiceDetail($idRoom)
    {
        $arrIdRoomService = [];

        $roomServices = DB::table('room_service_details')
        ->select('room_service_id')
        ->where('room_id', $idRoom)
        ->get();

        foreach ($roomServices as $key => $roomService) {
            $arrIdRoomService[] = $roomService->room_service_id;
        }

        return $arrIdRoomService;
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

    public function updateRoomServiceDetail($idRoom, $data)
    {
        $roomServices = DB::table('room_service_details')
        ->select('id')
        ->where('room_id', $idRoom)
        ->get();

        foreach ($roomServices as $key => $roomService) {
            $this->model->find($roomService->id)->delete();
        }

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
