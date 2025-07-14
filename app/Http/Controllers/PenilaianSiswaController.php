<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('id_user', Auth::id())->first();

        $penilaian = Penilaian::with('semester')
            ->where('id_siswa', $siswa->id)
            ->get();

        return view('siswa.penilaian.index', compact('penilaian'));
    }
}
