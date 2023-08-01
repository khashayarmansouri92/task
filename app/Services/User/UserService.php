<?php

namespace App\Services\User;

use App\Traits\User\InteractWithUser;
use Jenssegers\Mongodb\Eloquent\Model;

class UserService implements UserServiceInterface
{
    use InteractWithUser;

    /**
     * @param $request
     * @return Model
     * @throws \Exception
     */
    public function store($request) : Model
    {
        return $this->UserRepository()->store($request);
    }

    /**
     * @param $request
     * @return mixed
     * @throws \Exception
     */
    public function login($request)
    {
        return $this->UserRepository()->login($request);
    }
}
