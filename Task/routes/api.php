<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("/auth/register",[\App\Http\Controllers\AuthController::class,'register']);
Route::post("/auth/login",[\App\Http\Controllers\AuthController::class,'login']);


Route::group(['middleware'=>['auth:sanctum']],function (){
   Route::get('/me',function (Request $request){
       return auth()->user();
   });
    Route::post("/auth/logout",[\App\Http\Controllers\AuthController::class,'logout']);

// for user
    Route::get("/users",[\App\Http\Controllers\Api\UserController::class,'index']);
    Route::get("/user/{id}",[\App\Http\Controllers\Api\UserController::class,'show']);
    Route::put("/user/{id}",[\App\Http\Controllers\Api\UserController::class,'update']);
    Route::delete("/user/{id}",[\App\Http\Controllers\Api\UserController::class,'destroy']);
});
Route::post("/user",[\App\Http\Controllers\Api\UserController::class,'store']);
