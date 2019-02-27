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

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->paginate($limit, $columns);
    }
}
