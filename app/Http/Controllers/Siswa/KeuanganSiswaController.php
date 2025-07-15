<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('id_user', Auth::id())->first();

        $keuangan = Keuangan::where('id_siswa', $siswa->id)->get();

        return view('siswa.keuangan.index', compact('keuangan'));
    }
}
