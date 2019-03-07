<?php

namespace App\Repositories\V1\Module;

use App\Repositories\BaseRepository;
use App\Models\Module;
use Illuminate\Support\Facades\DB;

class ModuleRepository extends BaseRepository implements ModuleRepositoryInterface
{
    public function getModel()
    {
        return Module::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function store($data)
    {
        $data['slug'] = str_slug($data['name']);

        $file = $data['image'];
        $forder = 'uploads/images/modules';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $module = $this->model->find($id);
        $data['slug'] = str_slug($data['name']);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/modules/' . $module->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/modules');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $module->image;
        }

        return $module->update($data);
    }

    public function changestatus($data)
    {
        $id = $data['id'];
        $module = $this->model->find($id);
        $module->status = !$module->status;
        $module->save();

        return response()->json($module);
    }

    public function search($key)
    {
        $module = Module::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $module->appends(['key' => $key]);

        return $module;
    }

    public function breadCrumb()
    {
        $url = "$_SERVER[REQUEST_URI]";
        $url = ltrim($url, '/');

        if(strpos($url, "/")) {
            $url = explode('/', $url)[0];
        }

        return $module = Module::where('slug', 'LIKE', '%' . $url . '%')->take(1)->get();
    }
}
