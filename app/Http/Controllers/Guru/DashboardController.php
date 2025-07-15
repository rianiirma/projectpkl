<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Penilaian;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();

        if (!$guru) {
            return redirect()->route('login')->with('error', 'Akun guru tidak ditemukan.');
        }

        // Inisialisasi default
        $jadwals = collect();
        $jadwalHariIni = 0;
        $totalKelas = 0;
        $absensiHariIni = 0;
        $totalPenilaian = 0;

        // Ambil jadwal guru hari ini
        $jadwals = Jadwal::with(['kelas.jurusan', 'mapel'])
            ->where('id_guru', $guru->id)
            ->where('hari', now()->isoFormat('dddd')) // "Senin", "Selasa", dst
            ->get();

        $jadwalHariIni = $jadwals->count();

        // Total kelas yang diajar guru
        $totalKelas = Jadwal::where('id_guru', $guru->id)->distinct()->count('id_kelas');

        // Ambil semua id_kelas yang diajar guru
        $idKelasDiajar = Jadwal::where('id_guru', $guru->id)->pluck('id_kelas');

        // Ambil semua siswa dari kelas-kelas tersebut
        $idSiswa = Siswa::whereIn('id_kelas', $idKelasDiajar)->pluck('id');

        // Hitung absensi hari ini dari siswa-siswa tersebut
        $absensiHariIni = Absensi::whereIn('id_siswa', $idSiswa)
            ->whereDate('tanggal', now()->toDateString())
            ->count();

        // Hitung penilaian dari siswa-siswa tersebut
        $totalPenilaian = Penilaian::whereIn('id_siswa', $idSiswa)->count();

        return view('guru.index', compact(
            'jadwals',
            'jadwalHariIni',
            'totalKelas',
            'absensiHariIni',
            'totalPenilaian'
        ));
    }
}
