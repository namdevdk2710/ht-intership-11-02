<?php

namespace App\Repositories\V1\CuisineDetail;

use App\Repositories\BaseRepository;
use App\Models\CuisineDetail;
use Illuminate\Support\Facades\DB;

class CuisineDetailRepository extends BaseRepository implements CuisineDetailRepositoryInterface
{
    public function getModel()
    {
        return CuisineDetail::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->with('cuisine')->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function listCreate()
    {
        $cuisineList = $this->model::all();

        return $cuisineList;
    }

    public function search($key)
    {
        $cuisinedetail = CuisineDetail::where('name', 'LIKE', '%'.$key.'%')->paginate(5);
        $cuisinedetail->appends(['key' => $key]);

        return $cuisinedetail;
    }

    public function store($data)
    {
        $file = $data['image'];
        $forder = 'uploads/images/cuisinedetails';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $cuisine = $this->model->find($id);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/cuisinedetails/' . $cuisine->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/cuisinedetails');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $cuisine->image;
        }

        return $cuisine->update($data);
    }

    public function delete($id)
    {
        $cuisineDetail = $this->model->find($id);
        $nameImageOld = 'uploads/images/cuisinedetails/' . $cuisineDetail->image;
        if (file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }
        $cuisineDetail->delete();
    }
}
