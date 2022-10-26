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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('inflasis', App\Http\Controllers\InflasiController::class);
Route::resource('inflasi-klmpk-pengeluarans', App\Http\Controllers\InflasiKlmpkPengeluaranController::class);
Route::resource('kategoris', App\Http\Controllers\KategoriController::class);
Route::resource('pdrbs', App\Http\Controllers\PdrbController::class);
Route::resource('tenaga-kerjas', App\Http\Controllers\TenagaKerjaController::class);
Route::resource('kemiskinans', App\Http\Controllers\KemiskinanController::class);
Route::resource('ipms', App\Http\Controllers\IpmController::class);
Route::resource('penduduks', App\Http\Controllers\PendudukController::class);
Route::resource('penduduk-kecamatans', App\Http\Controllers\PendudukKecamatanController::class);
Route::resource('inflasi-kotas', App\Http\Controllers\InflasiKotaController::class);
Route::resource('ketimpangans', App\Http\Controllers\KetimpanganController::class);
Route::resource('penganggurans', App\Http\Controllers\PengangguranController::class);