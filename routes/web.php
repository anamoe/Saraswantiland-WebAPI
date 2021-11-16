<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/tes',function(){
    return view('dashboard');
});


Route::get('/login', [App\Http\Controllers\Web\AuthController::class, 'login']);



Route::resource('produk',App\Http\Controllers\Web\ProdukPerusahaanController::class);
Route::resource('promo',App\Http\Controllers\Web\PromoController::class);

Route::resource('lantai',App\Http\Controllers\Web\LantaiController::class);
Route::resource('ruang',App\Http\Controllers\Web\RuangController::class);

Route::resource('filosofi', App\Http\Controllers\Web\FilosofiTaglineController::class);
Route::get('/tagline', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'indextagline']);
Route::get('/contact', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'indexcontact']);

Route::resource('gedung', App\Http\Controllers\Web\TampilanGedungController::class);
// Route::get('/produk-edit/{$id}',[App\Http\Controllers\Web\ProdukPerusahaanController::class,'editt']);

Route::resource('/produk',App\Http\Controllers\Web\ProdukPerusahaanController::class);

Route::get('/riwayat',[App\Http\Controllers\API\PemesananRuanganController::class, 'indexriwayat']);

Route::get('/ikhtisar',function(){
    return view('profil.ikhtisar.index');
});


