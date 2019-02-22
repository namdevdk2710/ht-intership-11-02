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

    public function store($request)
    {
        $banner = new Banner($request->only(['name', 'description', 'link']));
        $banner->slug = str_slug($request->name);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $forder = '../public/uploadimages/banners';
            $nameFile = $file- > getClientOriginalName();
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = explode('.', $nameFile)[0].'-'.time().'.'.$extensionFile;
            $file->move($forder, $fileName);
            $banner->image = $fileName;
        }
        $banner->save();
        return $banner;
    }
}
