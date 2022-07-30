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
//    jamiyat haqida
    'homeSlider'=>\App\Http\Controllers\Api\HomeSliderController::class,
    'iesAj'=>\App\Http\Controllers\Api\JamiyatHaqida\IesAjController::class,
    'rivStrategiyasi'=>\App\Http\Controllers\Api\JamiyatHaqida\RivStrategiyasiController::class,
    'admission'=>\App\Http\Controllers\Api\JamiyatHaqida\AdmissionController::class,
    'transformaciya'=>\App\Http\Controllers\Api\JamiyatHaqida\TransformaciyaController::class,
    'missiya'=>\App\Http\Controllers\Api\JamiyatHaqida\MissiyaController::class,
    'company'=>\App\Http\Controllers\Api\JamiyatHaqida\CompaniesController::class,
    'contactUs'=>\App\Http\Controllers\Api\JamiyatHaqida\ContactUsController::class,
    'vertual'=>\App\Http\Controllers\Api\JamiyatHaqida\VirtualController::class,
//    faoliyat
    'vertualQabulxona'=>\App\Http\Controllers\Api\Faoliyat\VirtualQabulxonaController::class,
    'document'=>\App\Http\Controllers\Api\Faoliyat\DocumentController::class,
    'yoshlarIttifoqiYetakchisi'=>\App\Http\Controllers\Api\Faoliyat\YoshlarIttifoqiYetakchisiController::class,
    'xotinQizlarRaisi'=>\App\Http\Controllers\Api\Faoliyat\XotinQizlarRaisiController::class,
//    investitsiya siyosati
    'internationalRelations'=>\App\Http\Controllers\Api\InvestitsiyaSiyosati\InternationalRelationsController::class,
    'investment'=>\App\Http\Controllers\Api\InvestitsiyaSiyosati\InvestmentController::class,
//    Korporativ boshqaruv
    'ustav'=>\App\Http\Controllers\Api\KorporativBoshqaruv\UstavController::class,
    'supervisoryBoard'=>\App\Http\Controllers\Api\KorporativBoshqaruv\SupervisoryBoardController::class,
    'audit'=>\App\Http\Controllers\Api\KorporativBoshqaruv\AuditController::class
]);
Route::get('/search',[\App\Http\Controllers\Api\JamiyatHaqida\VirtualController::class,'search']);
