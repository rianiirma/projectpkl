<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class GuruDashboardController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Cari guru berdasarkan id_user
        $guru = Guru::where('id_user', $user->id)->first();

        $jadwals = collect(); // Collection kosong

        // Jika guru ditemukan, ambil jadwal yang sesuai dengan id_guru
        if ($guru) {
            $jadwals = Jadwal::with(['kelas', 'mapel'])
                ->where('id_guru', $guru->id)
                ->get();
        }

        return view('guru.index', compact('jadwals'));
    }
}
