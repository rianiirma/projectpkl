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
use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\JadwalSiswaController;
use App\Http\Controllers\PenilaianSiswaController;
use App\Http\Controllers\KeuanganSiswaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GuruDashboardController;
use App\Http\Controllers\SiswaDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

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
    'middleware' => ['auth', RoleMiddleware::class],
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
    Route::get('jadwal', [JadwalGuruController::class, 'index'])->name('jadwal.index');
    Route::get('penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('penilaian/create/{id_kelas}', [PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('penilaian/show/{id_kelas}/{jenis}', [PenilaianController::class, 'show'])->name('penilaian.show');
    Route::resource('absensi', AbsensiController::class)->except(['destroy']);
});

Route::group([
    'prefix' => 'siswa',
    'as' => 'siswa.',
    'middleware' => ['auth'],
], function () {
    Route::get('/', [SiswaDashboardController::class, 'index'])->name('dashboard');
    Route::get('/penilaian', [PenilaianSiswaController::class, 'index'])->name('penilaian.index');
    Route::get('/absensi', [AbsensiSiswaController::class, 'index'])->name('absensi.index');
    Route::get('/jadwal', [JadwalSiswaController::class, 'index'])->name('jadwal.index');
    Route::get('/keuangan', [KeuanganSiswaController::class, 'index'])->name('keuangan.index');
});

