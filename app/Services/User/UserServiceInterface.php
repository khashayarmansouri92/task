<?php

namespace App\Services\User;

use Jenssegers\Mongodb\Eloquent\Model;

interface UserServiceInterface
{
    public function store($request): Model;
    public function login($request);
}
