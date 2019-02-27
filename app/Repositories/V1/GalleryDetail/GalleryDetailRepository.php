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
        $forder = 'uploads/images/gallerydetails';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    public function update($id, $data)
    {
        $gallery = $this->model->find($id);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/gallerydetails/' . $gallery->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/gallerydetails');
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
        $galleryDetail = $this->model->find($id);
        $nameImageOld = 'uploads/images/gallerydetails/' . $galleryDetail->image;
        if (file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }
        $galleryDetail->delete();
    }
}
