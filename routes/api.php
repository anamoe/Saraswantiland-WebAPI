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


Route::post('/pesan-ruangan',[App\Http\Controllers\API\PemesananRuanganController::class,'addbooking']);
Route::get('/ikhtisar-perusahaan',[App\Http\Controllers\API\GetDataController::class,'getikhtisar']);
Route::get('/produk-perusahaan',[App\Http\Controllers\API\GetDataController::class,'getproduk']);
Route::get('/promo',[App\Http\Controllers\API\GetDataController::class,'getpromo']);
Route::get('/unit-lantai',[App\Http\Controllers\API\GetDataController::class,'getunitlantai']);
Route::get('/unit-ruangan/{id}',[App\Http\Controllers\API\GetDataController::class,'getunitruangan']);
Route::get('/filosofi',[App\Http\Controllers\API\GetDataController::class,'getfilosofi']);
Route::get('/tagline',[App\Http\Controllers\API\GetDataController::class,'gettagline']);
Route::get('/kontak-admin',[App\Http\Controllers\API\GetDataController::class,'getcontact']);
Route::get('/tampilangedung3d',[App\Http\Controllers\API\GetDataController::class,'gettampilangedung3d']);

Route::get('/getdetik',[App\Http\Controllers\API\GetDataController::class,'getdetik']);
Route::get('/getberanda',[App\Http\Controllers\API\GetDataController::class,'getberanda']);
Route::get('/getbisnisproperti',[App\Http\Controllers\API\GetDataController::class,'getbisnis']);
Route::get('/getkeuntunganinvestasi',[App\Http\Controllers\API\GetDataController::class,'getinvestasi']);


