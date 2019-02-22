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
        $banner = new Banner($request->only(['name', 'description','link']));
        $banner->slug = str_slug($request->name);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $forder = '../public/uploadimages/banners';
            $Filename = explode('.',$file->getClientOriginalName())[0].'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move($forder, $Filename);
            $banner->image = $Filename;
        }
        $banner->save();
        return $banner;
    }

}
