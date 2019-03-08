<?php

namespace App\Repositories\V1\About;

interface AboutRepositoryInterface
{
    public function search($key);

    public function indexTop($limit = null, $columns = ['*']);

    public function detail($id);
}
