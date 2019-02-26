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
    public function store($data)
    {
        $file = $data['image'];
        $forder = 'uploads/images/gallerys';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = $data['name'] . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);
    }
}
