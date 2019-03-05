<?php

namespace App\Repositories\V1\RoomService;

use App\Repositories\BaseRepository;
use App\Models\RoomService;
use Illuminate\Support\Facades\DB;

class RoomServiceRepository extends BaseRepository implements RoomServiceRepositoryInterface
{
    public function getModel()
    {
        return RoomService::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $roomservice = RoomService::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $roomservice->appends(['key' => $key]);

        return $roomservice;
    }
}
