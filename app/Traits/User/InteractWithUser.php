<?php

namespace App\Traits\User;

use App\Models\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;

trait InteractWithUser
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function UserService()
    {
        try {
            return app()->make(UserServiceInterface::class);
        }catch (\Exception $e) {
            throw new \Exception('Error');
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function UserRepository()
    {
        try {
            return app()->make(UserRepositoryInterface::class);
        }catch (\Exception $e) {
            throw new \Exception('Error');
        }
    }
}
