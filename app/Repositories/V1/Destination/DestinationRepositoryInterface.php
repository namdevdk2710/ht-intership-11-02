<?php

namespace App\Repositories\V1\Destination;

interface DestinationRepositoryInterface
{
    public function search($key);

    public function indexTop($limit = null, $columns = ['*']);

    public function detail($id);
}
