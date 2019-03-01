<?php

namespace App\Repositories\V1\Introduce;

use App\Repositories\BaseRepository;
use App\Models\Introduce;

class IntroduceRepository extends BaseRepository implements IntroduceRepositoryInterface
{
    public function getModel()
    {
        return Introduce::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('updated_at', 'Desc')->paginate($limit, $columns);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $introduce = $this->model->find($id);

        return $introduce->update($data);
    }

    public function delete($id)
    {
        $introduce = $this->model->find($id);

        $introduce->delete();
    }
}
