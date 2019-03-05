<?php

namespace App\Repositories\V1\Introduce;

interface IntroduceRepositoryInterface
{
    public function indexTop($limit = null, $columns = ['*']);
}
