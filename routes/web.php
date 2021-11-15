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
Route::resource('produk',App\Http\Controllers\Web\ProdukPerusahaanController::class);
Route::resource('promo',App\Http\Controllers\Web\PromoController::class);
// Route::get('/produk-edit/{$id}',[App\Http\Controllers\Web\ProdukPerusahaanController::class,'editt']);

Route::resource('/produk',App\Http\Controllers\Web\ProdukPerusahaanController::class);
Route::get('/ikhtisar',function(){
    return view('profil.ikhtisar.index');
});



