<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\ProfilController;
use App\Models\Pasien;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dokter/laporan',[DokterController::class, 'laporan'])->name('dokter.laporan');
Route::get('pasien/laporan',[PasienController::class, 'laporan'])->name('pasien.laporan');
Route::resource('dokter', DokterController::class);
Route::resource('profil', ProfilController::class);
Route::resource('kamar', KamarController::class);
Route::resource('obat', ObatController::class);
Route::resource('pasien', PasienController::class);



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


