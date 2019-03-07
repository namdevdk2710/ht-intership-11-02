<?php

namespace App\Repositories\V1\Room;

use App\Repositories\BaseRepository;
use App\Models\Room;
use App\Models\RoomService;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    public function getModel()
    {
        return Room::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('updated_at', 'Desc')->paginate($limit, $columns);
    }

    public function store($data)
    {
        $file = $data['image'];
        $data['slug'] = str_slug($data['name']);

        $forder = 'uploads/images/rooms';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        if ($this->model->create($data)) {
            return $this->model->create($data)->id;
        }
    }

    public function update($id, $data)
    {
        $room = $this->model->find($id);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/rooms/' . $room->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/rooms');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $room->image;
        }

        return $room->update($data);
    }

    public function changestatus($data)
    {
        $id = $data['id'];
        $room = $this->model->find($id);
        $room->status = !$room->status;
        $room->save();

        return response()->json($room);
    }

    public function detail($id)
    {
        return $room = $this->model->find($id);
    }

    public function anotherRoom($id)
    {
        $room = $this->model->find($id);
        $anotherrooms = Room::where('id', '!=', $room->id)->take(3)->get();

        return $anotherrooms;
    }
}
