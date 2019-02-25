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
    public function delete($id)
    {
        $Gallery = $this->model->find($id);
        $Gallery->delete();
    }
}
