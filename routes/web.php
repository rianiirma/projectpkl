<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalGuruController;
use App\Http\Controllers\JeniskeuanganController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GuruDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layouts.admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/guru/dashboard', [GuruDashboardController::class, 'index'])->name('guru.dashboard');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function () {
    route::resource('guru', GuruController::class);
    route::resource('siswa', SiswaController::class);
    route::resource('jadwal', JadwalController::class);
    route::resource('jeniskeuangan', JeniskeuanganController::class);
    route::resource('kelas', KelasController::class);
    route::resource('semester', SemesterController::class);
    route::resource('jurusan', JurusanController::class);
    route::resource('mapel', MapelController::class);
    route::resource('keuangan', KeuanganController::class);
    route::resource('user', UserController::class);
    route::resource('penilaian', PenilaianController::class);
    route::resource('absensi', AbsensiController::class);
});

Route::group([
    'prefix' => 'guru',
    'as' => 'guru.',
    'middleware' => ['auth'],
], function () {
    Route::get('/', [GuruDashboardController::class, 'index'])->name('dashboard');
    Route::resource('mapel', MapelController::class);
    Route::resource('penilaian', PenilaianController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::resource('jadwal', JadwalGuruController::class);
});

