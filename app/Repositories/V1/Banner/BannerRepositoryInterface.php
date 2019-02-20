<?php

namespace App\Repositories\V1\Banner;

interface BannerRepositoryInterface
{
    public function index();

    public function paginate($limit = null, $data = ['*']);

    public function find($id);

    public function store($data);

    public function update($id, $data);

    public function destroy($id);
}
