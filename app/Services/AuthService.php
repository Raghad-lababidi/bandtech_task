<?php

namespace App\Services;

use App\Repositories\Interfaces\AuthRepositoryInterface;

class AuthService
{
    public function __construct(protected AuthRepositoryInterface $authRepository)
    {
        //
    }

    public function login($request)
    {
        return $this->authRepository->signIn($request);
    }

    public function register($request)
    {
        return $this->authRepository->signUp($request);
    }
}
