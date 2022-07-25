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

Route::post('/auth/login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/auth/register',[\App\Http\Controllers\AuthController::class,'register'])->name('register');

Route::group(['middleware'=>['auth:sanctum']],function () {
    Route::get('/me', function (Request $request) {
        return auth()->user();
    });
    Route::post("/auth/logout",[\App\Http\Controllers\AuthController::class,'logout']);

    Route::post('/add_to_cart/{id}',[\App\Http\Controllers\Api\CartController::class,'add_to_cart'])->name('add_to_cart');
    Route::get('/allCart',[\App\Http\Controllers\Api\CartController::class,'allCart'])->name('allCart');
    Route::delete('/deleteCart/{id}',[\App\Http\Controllers\Api\CartController::class,'deleteCart'])->name('deleteCart');
    Route::delete('/deleteAll',[\App\Http\Controllers\Api\CartController::class,'deleteAll'])->name('deleteAll');
    Route::post('/addWishList/{id}',[\App\Http\Controllers\Api\WishListController::class,'addWishList'])->name('addWishList');
    Route::get('/allWishList',[\App\Http\Controllers\Api\WishListController::class,'allWishList'])->name('allWishList');
    Route::delete('/deleteWishList/{id}',[\App\Http\Controllers\Api\WishListController::class,'deleteWishList'])->name('deleteWishList');
    Route::delete('/deleteAllWishList',[\App\Http\Controllers\Api\WishListController::class,'deleteAllWishList'])->name('deleteAllWishList');



});





// home page
Route::get('/products',[\App\Http\Controllers\Api\HomeController::class,'products'])->name('products');
Route::get('/sale',[\App\Http\Controllers\Api\HomeController::class,'OnSale'])->name('sale');
Route::get('/latestProduct',[\App\Http\Controllers\Api\HomeController::class,'latestProduct'])->name('latestProduct');
Route::get('/categories',[\App\Http\Controllers\Api\HomeController::class,'categories'])->name('categories');
Route::get('/search',[\App\Http\Controllers\Api\HomeController::class,'search'])->name('search');


