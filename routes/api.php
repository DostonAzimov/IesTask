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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'homeSlider'=>\App\Http\Controllers\Api\HomeSliderController::class,
    'iesAj'=>\App\Http\Controllers\Api\JamiyatHaqida\IesAjController::class,
    'rivStrategiyasi'=>\App\Http\Controllers\Api\JamiyatHaqida\RivStrategiyasiController::class,
    'admission'=>\App\Http\Controllers\Api\JamiyatHaqida\AdmissionController::class,
    'transformaciya'=>\App\Http\Controllers\Api\JamiyatHaqida\TransformaciyaController::class,
    'missiya'=>\App\Http\Controllers\Api\JamiyatHaqida\MissiyaController::class,
    'company'=>\App\Http\Controllers\Api\JamiyatHaqida\CompaniesController::class,
    'contactUs'=>\App\Http\Controllers\Api\JamiyatHaqida\ContactUsController::class,
    'vertual'=>\App\Http\Controllers\Api\JamiyatHaqida\VirtualController::class,
    'vertualQabulxona'=>\App\Http\Controllers\Api\Faoliyat\VirtualQabulxonaController::class,
    'document'=>\App\Http\Controllers\Api\Faoliyat\DocumentController::class
]);
Route::get('/search',[\App\Http\Controllers\Api\JamiyatHaqida\VirtualController::class,'search']);
