<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function login($request)
    {
        $result= [];
        //get the credentials from request
        $credentials = $request->only(['user_name', 'password']);

        //check login information
        if (Auth::attempt($credentials)){
            $authUser = Auth::User();

            //create token for the user
            $data['token'] = $authUser->createToken('my-app-token')->plainTextToken;
            $data['user'] = $authUser;

            if (!$data['token']) {
                $result['success'] = false;
                return $result;
            }

            $result['data'] = $data;
            $result['success'] = true;
            return $result;
        }
        $result['success'] = false;
        return $result;

    }

    public function register($request)
    {
        //create new user and token
        $user = User::create($request);
        $data['token'] = $authUser->createToken('my-app-token')->plainTextToken;
        $data['user'] = $user;

        return $data;
    }
}
