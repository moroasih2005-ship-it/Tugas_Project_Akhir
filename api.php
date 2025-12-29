<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;

/*
|--------------------------------------------------------------------------
| AUTH (TANPA TOKEN)
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| PROTECTED API (WAJIB TOKEN SANCTUM)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout']);

    // MENGGANTI SEMUA RUTE MANUAL DENGAN SATU BARIS UNTUK API RESTFUL STANDAR
    Route::apiResource('siswa', SiswaController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::apiResource('guru', GuruController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::apiResource('kelas', KelasController::class)->only(['index', 'store', 'update', 'destroy']);
});