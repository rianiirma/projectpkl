<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('id_user', Auth::id())->first();

        $jadwal = Jadwal::with(['kelas', 'mapel', 'guru'])
            ->where('id_kelas', $siswa->id_kelas)
            ->get();

        return view('siswa.jadwal.index', compact('jadwal'));
    }
}
