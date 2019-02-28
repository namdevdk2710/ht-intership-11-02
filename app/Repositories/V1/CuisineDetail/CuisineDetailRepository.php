<?php

namespace App\Repositories\V1\CuisineDetail;

use App\Repositories\BaseRepository;
use App\Models\CuisineDetail;
use Illuminate\Support\Facades\DB;

class CuisineDetailRepository extends BaseRepository implements CuisineDetailRepositoryInterface
{
    public function getModel()
    {
        return CuisineDetail::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->with('cuisine')->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $cuisinedetail = CuisineDetail::where('name','LIKE','%'.$key.'%')->paginate(5);
        $cuisinedetail->appends(['key' => $key]);
        return $cuisinedetail;
    }
}
