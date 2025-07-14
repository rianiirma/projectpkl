<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class JadwalGuruController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $guru = Guru::where('id_user', $user->id)->first();

        $jadwals = collect();

        if ($guru) {
            $jadwals = Jadwal::with(['kelas', 'mapel'])
                ->where('id_guru', $guru->id)
                ->get();
        }

        return view('guru.jadwal.index', compact('jadwals'));
    }
}
