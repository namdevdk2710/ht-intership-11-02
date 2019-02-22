<?php

namespace App\Repositories\V1\Banner;

use App\Repositories\BaseRepository;
use App\Models\Banner;
use File;

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


    public function update($id, $data)
    {
        $banner = $this->model->find($id);
        $banner->name = $data['name'];
        $banner->description = $data['description'];

        $nameImageOld = $banner->image;
        $pathImageOld = 'public/'.$nameImageOld;
        if(file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }
        if ($data['image']!='') {
            $file = $data['image'];
            $forder = '../public';
            $Filename = explode('.',$file->getClientOriginalName())[0].'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move($forder, $Filename);
            $banner->image = $Filename;
        }
        $banner->slug=str_slug($data['name']);
        $banner->link=$data['link'];
        return $banner->update();

        // return $this->model->update($id, $data);
    }
}
