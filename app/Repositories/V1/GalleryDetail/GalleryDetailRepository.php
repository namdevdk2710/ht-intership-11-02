<?php

namespace App\Repositories\V1\GalleryDetail;

use App\Repositories\BaseRepository;
use App\Models\GalleryDetail;

class GalleryDetailRepository extends BaseRepository implements GalleryDetailRepositoryInterface
{
    public function getModel()
    {
        return GalleryDetail::class;
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
}
