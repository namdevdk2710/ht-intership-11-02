<?php

namespace App\Repositories\V1\FacilitieDetail;

use App\Repositories\BaseRepository;
use App\Models\FacilitieDetail;
use Illuminate\Support\Facades\DB;

class FacilitieDetailRepository extends BaseRepository implements FacilitieDetailRepositoryInterface
{
    public function getModel()
    {
        return facilitieDetail::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->with('facilitie')->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $facilitiedetail = FacilitieDetail::where('name', 'LIKE', '%'.$key.'%')->paginate(5);
        $facilitiedetail->appends(['key' => $key]);

        return $facilitiedetail;
    }

    public function listCreate()
    {
        $facilitieList = $this->model::all();

        return $facilitieList;
    }

    public function store($data)
    {
        $file = $data['image'];
        $forder = 'uploads/images/facilitiedetails';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $gacilitie = $this->model->find($id);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/facilitiedetails/' . $gacilitie->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/facilitiedetails');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $gacilitie->image;
        }

        return $gacilitie->update($data);
    }
}
