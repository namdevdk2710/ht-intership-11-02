<?php

namespace App\Repositories\V1\About;

use App\Repositories\BaseRepository;
use App\Models\About;
use Illuminate\Support\Facades\DB;

class AboutRepository extends BaseRepository implements AboutRepositoryInterface
{
    public function getModel()
    {
        return About::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function store($data)
    {
        $file = $data['image'];
        $forder = 'uploads/images/abouts';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;
        $data['slug'] = str_slug($data['name']);

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $about = $this->model->find($id);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/abouts/' . $about->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/abouts');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $about->image;
        }

        return $about->update($data);
    }

    public function search($key)
    {
        $about = About::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $about->appends(['key' => $key]);

        return $about;
    }

    public function delete($id)
    {
        $about = $this->model->find($id);
        $nameImageOld = 'uploads/images/abouts/' . $about->image;
        if (file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }
        $about->delete();
    }
}
