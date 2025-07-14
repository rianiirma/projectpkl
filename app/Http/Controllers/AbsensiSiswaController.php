<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Siswa;

class SiswaAbsensiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $siswa = Siswa::where('id_user', $user->id)->first();

        if (!$siswa) {
            return redirect()->route('siswa.dashboard')->with('error', 'Akun siswa tidak ditemukan.');
        }

        $absensis = Absensi::where('id_siswa', $siswa->id)->get();

        return view('siswa.absensi.index', compact('absensis'));
    }
}
