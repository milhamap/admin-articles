<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthRepository
{
    public function login (array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function create (array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
}
