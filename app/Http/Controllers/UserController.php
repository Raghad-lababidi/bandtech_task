<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct(protected UserService $userService) {
      }
  
      public function index()
      {
        try {
            $users = $this->userService->all();
            return $this->sendResponse('Users retrieved successfully',$users);
        } catch (Exception $e) {
            return $this->sendError( $ex->getMessage(),$ex->getCode());
        }
      }
  
      public function store(Request $request)
      {
        //Validate user data
          $data = $request->validate([
              'name' => 'required|string',
              'user_name' => 'required|unique:users,user_name',
              'password' => 'required|confirmed'
          ]);

          $attributes = $request->only([
            'name',
            'user_name'
          ]);
          //hash password before store
          try {
            $user = $this->userService->create(array_merge($attributes,['password' => Hash::make($request->input('password'))]));
            return $this->sendResponse('User stored successfully',$user);
        } catch (Exception $e) {
            return $this->sendError( $ex->getMessage(),$ex->getCode());
        }
      }
  
      public function show($id)
      {
        try {
            $user = $this->userService->find($id);
            return $this->sendResponse('User retrieved successfully',$user);
        } catch (Exception $e) {
            return $this->sendError( $ex->getMessage(),$ex->getCode());
        }
      }
  
      public function update(Request $request, $id)
      {
          $data = $request->validate([
              'name' => 'string',
              'user_name' => 'unique:users,user_name',
              'avatar' => 'string'
              
          ]);
  
        try {
            $user = $this->userService->update($data, $id);
            return $this->sendResponse('User updated successfully',$user);
        } catch (Exception $e) {
            return $this->sendError( $ex->getMessage(),$ex->getCode());
        }
      }
  
      public function destroy($id)
      {
        try {
            $this->userService->delete($id);
            return $this->sendResponse('User deleted successfully');
        } catch (Exception $e) {
            return $this->sendError( $ex->getMessage(),$ex->getCode());
        }
      }
}
