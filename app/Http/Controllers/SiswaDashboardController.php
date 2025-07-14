<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('id_user', Auth::id())->first();
        return view('siswa.index', compact('siswa'));
    }
}
