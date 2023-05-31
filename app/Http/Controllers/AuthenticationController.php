<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    private AuthRepository $authRepository;
    private Request $request;

    public function __construct (AuthRepository $authRepository, Request $request)
    {
        $this->authRepository = $authRepository;
        $this->request = $request;
    }
    public function registerPage ()
    {
        return view('auth.register');
    }

    public function loginPage ()
    {
        return view('auth.login');
    }


    public function login () {
        $authService = new AuthService(
            $this->authRepository,
            $this->request
        );

        if ($authService->authenticate())
            return redirect()->intended('/dashboard');

        return back()->with('error', 'Invalid credentials');
    }

    public function logout () {
        $authService = new AuthService(
            $this->authRepository,
            $this->request
        );

        $authService->logout();

        return redirect()->route('login');
    }
}
