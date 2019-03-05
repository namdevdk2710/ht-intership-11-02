<?php

namespace App\Repositories\V1\Banner;

interface BannerRepositoryInterface
{
    public function search($key);

    public function indexTop($limit = null, $columns = ['*']);
}
