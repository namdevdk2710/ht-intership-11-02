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
        // $data['slug'] = str_slug($data['name']);

        $file = $data['image'];
        $forder = 'uploads/images/banners';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = $data['name'] . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);

    }
}
