<?php

namespace App\Repositories\V1\Banner;

use App\Repositories\BaseRepository;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    public function getModel()
    {
        return Banner::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('updated_at', 'Desc')->paginate($limit, $columns);
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

    public function update($id, $data)
    {
        $banner = $this->model->find($id);
        $data['slug'] = str_slug($data['name']);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/banners/' . $banner->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/banners');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $banner->image;
        }

        return $banner->update($data);
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

    public function search($key)
    {
        $banners = Banner::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $banners->appends(['key' => $key]);

        return $banners;
    }

    public function indexTop($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('updated_at', 'Desc')->take($limit)->get($columns);
    }
}
