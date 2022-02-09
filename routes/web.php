<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Route::get('/', function () {
//     return view('dashboard');
// });
// Route::get('/maps',function(){
//     return view('lokasi');
// });
Route::get('/maps', [App\Http\Controllers\Web\ProfilPerusahaanController::class,'indexlanding']);

Route::get('/logout', [App\Http\Controllers\Web\AuthController::class, 'logout']);
// Route::get('/login', [App\Http\Controllers\Web\AuthController::class, 'login']);
Route::post('/login', [App\Http\Controllers\Web\AuthController::class, 'logins'])->name('login');

Route::get('/register', [App\Http\Controllers\Web\AuthController::class, 'register']);
Route::post('/register', [App\Http\Controllers\Web\AuthController::class, 'registers'])->name('register');

Route::get('/', function () {
    if(auth()->check()){
        return view('dashboard');
      
    }  
     else{
        return view('auth.login.index');
    }

})->name('login');


Route::get('/login', function () {
    if(auth()->check()){
        return redirect('/');
      
    }  
     else{
        return view('auth.login.index');
    }

})->name('login');

Route::get('/register', function () {
    if(auth()->check()){
        return redirect('/'); 
    }
    else{
    return view('auth.register');
    }
})->name('register');


Route::middleware(['middleware' => 'auth'])->group(function () {

Route::get('/profil', [App\Http\Controllers\Web\AuthController::class, 'index'])->name('profil');
 Route::post('/updateprofile', [App\Http\Controllers\Web\AuthController::class, 'update_profil'])->name('updateprofile');
Route::post('/updatepass', [App\Http\Controllers\Web\AuthController::class, 'update_pass'])->name('updatepass');
Route::post('perbaruifoto', [App\Http\Controllers\Web\AuthController::class, 'update_foto']);
Route::resource('unit',App\Http\Controllers\Web\UnitController::class);


Route::resource('produk',App\Http\Controllers\Web\ProdukPerusahaanController::class);
Route::resource('promo',App\Http\Controllers\Web\PromoController::class);
Route::resource('beranda',App\Http\Controllers\Web\BerandaController::class);

Route::resource('lantai',App\Http\Controllers\Web\LantaiController::class);
Route::resource('ruang',App\Http\Controllers\Web\RuangController::class);

Route::get('/filosofi', [App\Http\Controllers\Web\FilosofiTaglineController::class,'index']);
Route::get('/tagline', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'indextagline']);
Route::get('/contact', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'indexcontact']);

Route::patch('/update-kontak/{id}', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'updatekontak']);
Route::patch('/update-filosofi', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'updatefilosofi']);
Route::patch('/update-tagline', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'updatetagline']);


Route::get('/get-contact/{$id}', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'updatekontak']);
Route::get('/get-filosofi', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'showfilosofi']);
Route::get('/get-tagline', [App\Http\Controllers\Web\FilosofiTaglineController::class, 'showtagline']);




Route::resource('gedung', App\Http\Controllers\Web\TampilanGedungController::class);
Route::resource('bisnis', App\Http\Controllers\Web\BisnisPropertiController::class);
// Route::get('/produk-edit/{$id}',[App\Http\Controllers\Web\ProdukPerusahaanController::class,'editt']);

Route::resource('/produk',App\Http\Controllers\Web\ProdukPerusahaanController::class);
Route::resource('/investasi',App\Http\Controllers\Web\KeuntunganInvestasiController::class);

Route::get('/riwayat',[App\Http\Controllers\API\PemesananRuanganController::class, 'indexriwayat']);

Route::post('add-riwayat',[App\Http\Controllers\API\PemesananRuanganController::class, 'addriwayat']);

Route::delete('del-riwayat/{id}',[App\Http\Controllers\API\PemesananRuanganController::class, 'delriwayat']);

Route::patch('up-riwayat/{id}',[App\Http\Controllers\API\PemesananRuanganController::class, 'upriwayat']);

Route::resource('ikhtisar', App\Http\Controllers\Web\ProfilPerusahaanController::class);

});
