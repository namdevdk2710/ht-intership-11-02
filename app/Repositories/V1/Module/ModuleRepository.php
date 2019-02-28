<?php

namespace App\Repositories\V1\Module;

use App\Repositories\BaseRepository;
use App\Models\Module;

class ModuleRepository extends BaseRepository implements ModuleRepositoryInterface
{
    public function getModel()
    {
        return Module::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    public function changestatus($data)
    {
        $id = $data['id'];
        $module = $this->model->find($id);
        $module->status = !$module->status;
        $module->save();

        return response()->json($module);
    }

}
