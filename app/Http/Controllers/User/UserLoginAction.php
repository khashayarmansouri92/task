<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\CustomApiResponse;
use App\Traits\User\InteractWithUser;
use Illuminate\Support\Facades\Auth;

class UserLoginAction
{
    use InteractWithUser;

    /**
     * @param UserLoginRequest $request
     * @return CustomApiResponse
     * @throws \Exception
     */
    public function __invoke(UserLoginRequest $request)
    {
        $token = $this->UserService()->login($request);

        if ($token) {
            return new CustomApiResponse([
                'status' => '200',
                'message' => 'User login successfully',
                'data' => ['user' => Auth::user(), 'token' => $token],
            ]);
        }

        return new CustomApiResponse([
            'status' => '401',
            'message' => 'Invalid credentials'
        ]);
    }
}
