<?php

namespace App\Repositories\V1\Module;

interface ModuleRepositoryInterface
{
    public function search($key);

    public function breadCrumb();
}
