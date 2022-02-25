<?php
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\WilayahController;
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
    return view('auth.login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('kategori', KategoriController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('destinasi', DestinasiController::class);
Route::resource('wilayah', WilayahController::class);
