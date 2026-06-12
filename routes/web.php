<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AktivitasController;

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/proses-login', [LoginController::class, 'login']);


    Route::middleware('login')->group(function () {

    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::get('/dosen', function () {
        return view('dosen.dashboard');
    });

    Route::get('/mahasiswa', [MahasiswaController::class, 'getProgram']);

    Route::get('/dashboard', [MahasiswaController::class, 'index']);

    // Aktivitas MBKM
    Route::get('/aktivitas', [AktivitasController::class, 'index']);

    Route::get('/tambah-program', [AktivitasController::class, 'create']);

    Route::post('/simpan-program', [AktivitasController::class, 'store']);

    Route::get('/tambah-progress/{id}', [AktivitasController::class, 'createProgress']);

    Route::post('/simpan-progress', [AktivitasController::class, 'storeProgress']);

    // Progress
    Route::get('/progress', function () {
        return view('mahasiswa.progress');
    });

    // Profile
    Route::get('/profile', function () {
        return view('mahasiswa.profile');
    });

});