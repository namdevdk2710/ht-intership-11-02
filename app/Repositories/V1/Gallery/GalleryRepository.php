<?php

namespace App\Repositories\V1\Gallery;

use App\Repositories\BaseRepository;
use App\Models\Gallery;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    public function getModel()
    {
        return Gallery::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    public function store($data)
    {
        $file = $data['image'];
        $forder = 'uploads/images/gallerys';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $gallery = $this->model->find($id);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/gallerys/' . $gallery->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/gallerys');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $gallery->image;
        }

        return $gallery->update($data);
    }

    public function delete($id)
    {
        $gallery = $this->model->find($id);
        $nameImageOld = 'uploads/images/gallerys/' . $gallery->image;
        if (file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }
        $gallery->delete();
    }

    public function listCreate()
    {
        $galleryList = $this->model::all();

        return $galleryList;
    }
}
