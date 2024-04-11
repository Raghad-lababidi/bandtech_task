<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);   //login Api
Route::post('register', [AuthController::class, 'register']);  //register Api

// use sanctum for authentication
Route::group(['middleware' => 'auth:sanctum'], function () {

    // User
    Route::group(['prefix' => 'user'], function () {
        Route::get('get-all', [UserController::class, 'index']); // get all users Api
        Route::get('get-by-id/{id}', [UserController::class, 'show']);  //get user by id Api
        Route::post('create', [UserController::class, 'store']);   //create user Api
        Route::post('update', [UserController::class, 'update']);  // update user Api
        Route::post('delete', [UserController::class, 'destroy']);  // delete user Api
    });

    // Product
    Route::group(['prefix' => 'product'], function () {
        Route::get('get-all', [ProductController::class, 'index']);  // get all products Api
        Route::get('get-by-id/{id}', [ProductController::class, 'show']);  // get product by id Api
        Route::post('create', [ProductController::class, 'store']);  //create product Api
        Route::post('update', [ProductController::class, 'update']);   //update product Api 
        Route::post('delete', [ProductController::class, 'destroy']);   //delete product Api
        Route::get('products-by-usertype', [ProductController::class, 'productsByUserType']);   //get all active products according to user type
    });


});


