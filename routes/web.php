<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgressController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/proses-login', [LoginController::class, 'login']);


Route::middleware('login')->group(function () {

    Route::get('/logout', [LoginController::class, 'logout']);

    //ROLE MAHASISWA
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::get('/dosen', function () {
        return view('dosen.dashboard');
    });

    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

    Route::get('/dashboard', [MahasiswaController::class, 'index']);

    // Aktivitas MBKM
    Route::get('/aktivitas', [AktivitasController::class, 'index']);

    Route::get('/tambah-program', [AktivitasController::class, 'create']);

    Route::post('/simpan-program', [AktivitasController::class, 'store']);

    Route::get('/tambah-progress/{id}', [AktivitasController::class, 'createProgress']);

    Route::post('/simpan-progress', [AktivitasController::class, 'storeProgress']);

    Route::get('/edit-program/{id}', [AktivitasController::class, 'edit']);

    Route::post('/update-program/{id}', [AktivitasController::class, 'update']);

    // Progress
    Route::get('/progress', [ProgressController::class, 'formProgress']);

    // Halaman Form Progress
    Route::get('/tambah-progress/{id}', [ProgressController::class, 'createProgress']);

    // Simpan Progress
    Route::post('/simpan-progress', [ProgressController::class, 'storeProgress']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'index']);

    Route::post('/profile/update', [ProfileController::class, 'update']);

    //ROLE ADMIN

    //dashboard
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get(
        '/detail-mbkm/{id}',
        [AdminController::class, 'detail']
    );

    //informasi mbkm
    Route::get(
        '/informasi-mbkm',
        [ProgramController::class, 'index']
    );

    Route::get(
        '/informasi-mbkm/create',
        [ProgramController::class, 'create']
    );

    Route::post(
        '/informasi-mbkm/store',
        [ProgramController::class, 'store']
    );

    Route::get(
        '/informasi-mbkm/delete/{id}',
        [ProgramController::class, 'delete']
    );

    Route::get(
        '/informasi-mbkm/detail/{id}',
        [ProgramController::class, 'detail']
    );

    Route::get(
        '/informasi-mbkm/detail/{id}',
        [ProgramController::class, 'detail']
    );

    Route::post(
        '/informasi-mbkm/update/{id}',
        [ProgramController::class, 'update']
    );

    //ROLE DOSEN
    Route::get('/dosen', [DosenController::class, 'index']);

    Route::get(
        '/detail-mahasiswa/{id}',
        [DosenController::class, 'detail']
    );

    // Role Dosen
    Route::get('/dosen', [DosenController::class, 'index']);

    Route::get('/informasi-mahasiswa', [DosenController::class, 'informasiMahasiswa']);

    Route::get('/detail-mahasiswa/{id}', [DosenController::class, 'detailMahasiswa']);

    Route::post('/simpan-komentar', [DosenController::class, 'simpanKomentar']);
});
