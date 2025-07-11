<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JeniskeuanganController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::prefix('admin')->middleware('auth')->group(function () {
    route::resource('guru', GuruController::class);
    route::resource('siswa', SiswaController::class);
    route::resource('jadwal', JadwalController::class);
    route::resource('jeniskeuangan', JeniskeuanganController::class);
    route::resource('kelas', KelasController::class);
    route::resource('semester', SemesterController::class);
    route::resource('jurusan', JurusanController::class);
    route::resource('mapel', MapelController::class);
    

});
