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

    public function store($data)
    {
        $file = $data['icon'];
        $forder = 'uploads/images/roomservices';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['icon'] = $fileName;

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $roomservice = $this->model->find($id);

        if (!empty($data['icon'])) {
            $file = $data['icon'];
            $nameImageOld = 'uploads/images/roomservices/' . $roomservice->icon;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/roomservices');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['icon'] = $fileName;
        } else {
            $data['icon'] = $roomservice->icon;
        }

        return $roomservice->update($data);
    }

    public function delete($id)
    {
        $roomservice = $this->model->find($id);
        $roomservice->delete();
    }
}
