<?php

namespace App\Repositories\V1\About;

use App\Repositories\BaseRepository;
use App\Models\About;
use Illuminate\Support\Facades\DB;

class AboutRepository extends BaseRepository implements AboutRepositoryInterface
{
    public function getModel()
    {
        return About::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $About = About::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $About->appends(['key' => $key]);

        return $About;
    }
}
