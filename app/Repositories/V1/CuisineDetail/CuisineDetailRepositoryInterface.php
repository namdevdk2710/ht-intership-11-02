<?php

namespace App\Repositories\V1\CuisineDetail;

interface CuisineDetailRepositoryInterface
{
    public function search($key);

    public function listCreate();
}
