<?php

use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// Admin Controllers
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\JeniskeuanganController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\PenilaianController as AdminPenilaianController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guru\AbsensiController as GuruAbsensiController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;

// Guru Controllers
use App\Http\Controllers\Guru\JadwalController as JadwalGuruController;
use App\Http\Controllers\Guru\PenilaianController as GuruPenilaianController;
use App\Http\Controllers\Siswa\AbsensiController as AbsensiSiswaController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;

// Siswa Controllers
use App\Http\Controllers\Siswa\JadwalController as JadwalSiswaController;
use App\Http\Controllers\Siswa\KeuanganController as KeuanganSiswaController;
use App\Http\Controllers\Siswa\PenilaianController as PenilaianSiswaController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;

// =======================
// ROUTES
// =======================

Route::get('/', function () {
    return view('welcome'); // Bisa diganti ke halaman landing page kamu
});

Auth::routes();

// Global Dashboard Redirector
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'guru') {
        return redirect()->route('guru.dashboard');
    } elseif ($user->role === 'siswa') {
        return redirect()->route('siswa.dashboard');
    }

    abort(403, 'Role tidak dikenali.');
})->middleware(['auth'])->name('dashboard');


// =======================
// ADMIN
// =======================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('guru', GuruController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('jeniskeuangan', JeniskeuanganController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('semester', SemesterController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('keuangan', KeuanganController::class);
    Route::resource('user', UserController::class);
    Route::resource('penilaian', AdminPenilaianController::class);
    Route::resource('absensi', AdminAbsensiController::class);
});

// =======================
// GURU
// =======================
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');

    Route::get('jadwal', [JadwalGuruController::class, 'index'])->name('jadwal.index');

    Route::get('penilaian', [GuruPenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('penilaian/create/{id_kelas}', [GuruPenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('penilaian', [GuruPenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('penilaian/show/{id_kelas}/{jenis}', [GuruPenilaianController::class, 'show'])->name('penilaian.show');

    Route::get('absensi', [\App\Http\Controllers\Guru\AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('absensi', [\App\Http\Controllers\Guru\AbsensiController::class, 'store']);
    Route::put('absensi/{id}', [\App\Http\Controllers\Guru\AbsensiController::class, 'update']);
});

// =======================
// SISWA
// =======================
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
    Route::get('/penilaian', [PenilaianSiswaController::class, 'index'])->name('penilaian.index');
    Route::get('/absensi', [AbsensiSiswaController::class, 'index'])->name('absensi.index');
    Route::get('/jadwal', [JadwalSiswaController::class, 'index'])->name('jadwal.index');
    Route::get('/keuangan', [KeuanganSiswaController::class, 'index'])->name('keuangan.index');
});
