<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthService
{
    private AuthRepository $authRepository;
    private Request $request;

    public function __construct (AuthRepository $authRepository, Request $request)
    {
        $this->authRepository = $authRepository;
        $this->request = $request;
    }

    public function authenticate (): bool
    {
        $validatedData = $this->request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if ($this->authRepository->login($validatedData)) {
            $this->request->session()->regenerate();
            return true;
        }
        return false;
    }

    public function logout (): void
    {
        $this->request->session()->invalidate();
        $this->request->session()->regenerateToken();
    }
}
