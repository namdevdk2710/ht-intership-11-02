<?php

namespace App\Repositories\V1\Cuisine;

use App\Repositories\BaseRepository;
use App\Models\Cuisine;
use Illuminate\Support\Facades\DB;

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

    public function update($id, $data)
    {
        $cuisine = $this->model->find($id);

        return $cuisine->update($data);
    }

    public function listCreate()
    {
        $cuisineList = $this->model::all();

        return $cuisineList;
    }

    public function search($key)
    {
        $cuisine = Cuisine::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $cuisine->appends(['key' => $key]);

        return $cuisine;
    }

    public function delete($id)
    {
        $cuisine = $this->model->find($id);
        $cuisine->delete();
    }

    public function test()
    {
        $cuisines = DB::table('cuisines')->get();

        foreach ( $cuisines as $cuisine )
        {
            $cuisinedetail = DB::table('cuisine_details')->where('cuisine_id', $cuisine->id)->take(2)->get();
            $cuisine->id = $cuisinedetail;
        }

        return $cuisines;
    }
}
