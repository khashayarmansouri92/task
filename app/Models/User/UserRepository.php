<?php

namespace App\Models\User;

use App\Models\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function login($request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);

        if ($token)
            return $token;

        return null;
    }
}
