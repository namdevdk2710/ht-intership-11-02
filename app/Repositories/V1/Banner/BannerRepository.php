<?php

namespace App\Repositories\V1\Banner;

use App\Repositories\BaseRepository;
use App\Models\Banner;

class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    public function getModel()
    {
        return Banner::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    public function store($data)
    {
        $data['slug'] = str_slug($data['name']);

        $file = $data['image'];
        $forder = 'uploads/images/banners';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);
    }
    public function delete($id)
    {
        $banner = $this->model->find($id);
        $nameImageOld = 'uploads/images/banners/' . $banner->image;
        if (file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }
        $banner->delete();
    }
}
