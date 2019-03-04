<?php

namespace App\Repositories\V1\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $user = User::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $user->appends(['key' => $key]);

        return $user;
    }

    public function store($data)
    {
        $data['password'] = bcrypt($data['password']);
        if (isset($data['avatar'])) {
            $file = $data['avatar'];
            $forder = 'uploads/images/users';
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['avatar'] = $fileName;
        }

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $user = $this->model->find($id);
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        if (isset($data['avatar'])) {
            $file = $data['avatar'];
            $nameImageOld = 'uploads/images/users/' . $user->avatar;
            if (empty(file_exists(public_path($nameImageOld)))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/users');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['avatar'] = $fileName;
        } else {
            $data['avatar'] = $user->avatar;
        }

        return $user->update($data);
    }
}
