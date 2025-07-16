<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $guru = Guru::where('id_user', $user->id)->first();

        $jadwals = collect();

        if ($guru) {
            $jadwals = Jadwal::with(['kelas.jurusan', 'mapel'])
                ->where('id_guru', $guru->id)
                ->get();
        }

        return view('guru.jadwal.index', compact('jadwals'));
    }
}
