<?php

namespace App\Repositories\V1\Room;

use App\Repositories\BaseRepository;
use App\Models\Room;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    public function getModel()
    {
        return Room::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    public function changestatus($data)
    {
        $id = $data['id'];
        $room = $this->model->find($id);
        $room->status = !$room->status;
        $room->save();

        return response()->json($room);
    }
}
