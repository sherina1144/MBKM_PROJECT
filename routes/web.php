<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('login');
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

    Route::get('/aktivitas', function () {
        return view('mahasiswa.aktivitas');
    });

    Route::get('/progress', function () {
        return view('mahasiswa.progress');
    });

    Route::get('/profile', function () {
        return view('mahasiswa.profile');
    });

});