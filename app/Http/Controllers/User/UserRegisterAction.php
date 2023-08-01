<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\CustomApiResponse;
use App\Traits\User\InteractWithUser;

class UserRegisterAction
{
    use InteractWithUser;

    /**
     * @param UserRegisterRequest $request
     * @return CustomApiResponse
     * @throws \Exception
     */
    public function __invoke(UserRegisterRequest $request)
    {
        $user = $this->UserService()->store([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return new CustomApiResponse([
            'status' => '201',
            'message' => 'User registered successfully',
            'data' => ['user' => $user]
        ]);
    }
}
