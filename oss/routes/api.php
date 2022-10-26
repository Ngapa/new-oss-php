<?php

use App\Http\Controllers\Api\KategoriController;
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

Route::apiResource('kategori', KategoriController::class);


Route::resource('inflasis', App\Http\Controllers\API\InflasiAPIController::class)
    ->except(['create', 'edit']);

Route::resource('inflasi-klmpk-pengeluarans', App\Http\Controllers\API\InflasiKlmpkPengeluaranAPIController::class)
    ->except(['create', 'edit']);

Route::resource('kategoris', App\Http\Controllers\API\KategoriAPIController::class)
    ->except(['create', 'edit']);

Route::resource('pdrbs', App\Http\Controllers\API\PdrbAPIController::class)
    ->except(['create', 'edit']);

Route::resource('tenaga-kerjas', App\Http\Controllers\API\TenagaKerjaAPIController::class)
    ->except(['create', 'edit']);

Route::resource('kemiskinans', App\Http\Controllers\API\KemiskinanAPIController::class)
    ->except(['create', 'edit']);

Route::resource('ipms', App\Http\Controllers\API\IpmAPIController::class)
    ->except(['create', 'edit']);

Route::resource('penduduks', App\Http\Controllers\API\PendudukAPIController::class)
    ->except(['create', 'edit']);

Route::resource('penduduk-kecamatans', App\Http\Controllers\API\PendudukKecamatanAPIController::class)
    ->except(['create', 'edit']);

Route::resource('inflasi-kotas', App\Http\Controllers\API\InflasiKotaAPIController::class)
    ->except(['create', 'edit']);

Route::resource('ketimpangans', App\Http\Controllers\API\KetimpanganAPIController::class)
    ->except(['create', 'edit']);

Route::resource('penganggurans', App\Http\Controllers\API\PengangguranAPIController::class)
    ->except(['create', 'edit']);