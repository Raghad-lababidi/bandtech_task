<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {
    }

    public function login(Request $request)
      {
        //Validate login data
          $data = $request->validate([
              'user_name' => 'required|unique:users,user_name',
              'password' => 'required'
          ]);

          try {
            //call the method from authservice
            $result = $this->authService->login($data);
            if(!$result['success'])
              return $this->sendError('Invalid username or password',401);

            return $this->sendResponse('User signed in',$result['data']);
        } catch (Exception $e) {
            return $this->sendError( $ex->getMessage(),$ex->getCode());
        }
      }

    public function register(Request $request)
      {
        //Validate register data
          $data = $request->validate([
            'name' => 'required|string',
            'user_name' => 'required|unique:users,user_name',
            'password' => 'required|confirmed'
          ]);

          $attributes = $request->only([
            'name',
            'user_name'
          ]);

          try {
            $user = $this->authService->register(array_merge($attributes,['password' => Hash::make($request->input('password'))]));
            return $this->sendResponse('User created successfully',$user);
        } catch (Exception $e) {
            return $this->sendError( $ex->getMessage(),$ex->getCode());
        
        }
    }
}
       

