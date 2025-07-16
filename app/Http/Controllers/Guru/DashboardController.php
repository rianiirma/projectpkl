<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Penilaian;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $guru = Guru::where('id_user', $user->id)->first();

        if (!$guru) {
            return redirect()->route('dashboard')->with('error', 'Akun guru tidak valid.');
        }

        $hariIni = Carbon::now()->locale('id')->isoFormat('dddd'); // Contoh: "Senin"

        // Ambil jadwal hari ini
        $jadwalsHariIni = Jadwal::with(['kelas.jurusan', 'mapel'])
            ->where('id_guru', $guru->id)
            ->where('hari', $hariIni)
            ->get();

        $jumlahJadwalHariIni = $jadwalsHariIni->count();

        // Ambil semua id_kelas dari guru
        $idKelasDiajar = Jadwal::where('id_guru', $guru->id)->pluck('id_kelas')->unique();

        // Hitung total kelas unik
        $totalKelas = $idKelasDiajar->count();

        // Ambil semua siswa dari kelas yang diajar
        $idSiswa = Siswa::whereIn('id_kelas', $idKelasDiajar)->pluck('id');

        // Hitung absensi hari ini
        $jumlahAbsensiHariIni = Absensi::whereIn('id_siswa', $idSiswa)
            ->whereDate('tanggal', Carbon::today())
            ->count();

        // Hitung jumlah penilaian dari siswa yang diajar
        $jumlahPenilaian = Penilaian::whereIn('id_siswa', $idSiswa)->count();

        // Arahkan ke guru.index karena view kamu disimpan di situ
        return view('guru.index', compact(
            'jadwalsHariIni',
            'jumlahJadwalHariIni',
            'totalKelas',
            'jumlahAbsensiHariIni',
            'jumlahPenilaian',
            'guru' // Untuk menampilkan nama
        ));
    }
}
