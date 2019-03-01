<?php

namespace App\Repositories\V1\Facilitie;

use App\Repositories\BaseRepository;
use App\Models\Facilitie;
use Illuminate\Support\Facades\DB;

class FacilitieRepository extends BaseRepository implements FacilitieRepositoryInterface
{
    public function getModel()
    {
        return Facilitie::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $facilitie = Facilitie::where('name', 'LIKE', '%'.$key.'%')->paginate(5);
        $facilitie->appends(['key' => $key]);

        return $facilitie;
    }
}
