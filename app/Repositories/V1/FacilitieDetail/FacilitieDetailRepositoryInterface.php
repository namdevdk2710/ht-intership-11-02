<?php

namespace App\Repositories\V1\FacilitieDetail;

interface FacilitieDetailRepositoryInterface
{
    public function search($key);

    public function listCreate();

    public function indexTop($limit = null, $columns = ['*']);
}
