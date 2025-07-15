<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\Siswa;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahGuru = Guru::count();
        $semesterAktif = Semester::where('status', 'aktif')->first();
        $jumlahKelas = Kelas::count();

        return view('layouts.dashboard', compact('jumlahSiswa', 'jumlahGuru', 'semesterAktif', 'jumlahKelas'));
    }
}
