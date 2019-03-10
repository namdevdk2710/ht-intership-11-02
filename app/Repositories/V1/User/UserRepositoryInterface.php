<?php

namespace App\Repositories\V1\User;

interface UserRepositoryInterface
{
    public function search($key);

    public function login($request);

    public function logout();
}
