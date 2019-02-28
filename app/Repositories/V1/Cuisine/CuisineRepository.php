<?php

namespace App\Repositories\V1\Cuisine;

use App\Repositories\BaseRepository;
use App\Models\Cuisine;

class CuisineRepository extends BaseRepository implements CuisineRepositoryInterface
{
    public function getModel()
    {
        return Cuisine::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }
}
