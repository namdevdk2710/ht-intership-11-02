<?php

namespace App\Repositories\V1\Destination;

use App\Repositories\BaseRepository;
use App\Models\Destination;
use Illuminate\Support\Facades\DB;

class DestinationRepository extends BaseRepository implements DestinationRepositoryInterface
{
    public function getModel()
    {
        return Destination::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function store($data)
    {
        $file = $data['image'];
        $forder = 'uploads/images/destinations';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;
        $data['slug'] = str_slug($data['name']);

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $destination = $this->model->find($id);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/destinations/' . $destination->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/destinations');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $destination->image;
        }

        return $destination->update($data);
    }

    public function search($key)
    {
        $destinations = Destination::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $destinations->appends(['key' => $key]);

        return $destinations;
    }

    public function delete($id)
    {
        $destination = $this->model->find($id);
        $nameImageOld = 'uploads/images/destinations/' . $destination->image;
        if (file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }
        $destination->delete();
    }
}
