<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Semester;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $guru = \App\Models\Guru::where('id_user', $user->id)->first();

        if (!$guru) {
            return redirect()->route('guru.dashboard')->with('error', 'Akun guru belum terhubung. Hubungi admin.');
        }

        $jadwals = \App\Models\Jadwal::with('kelas')
            ->where('id_guru', $guru->id)
            ->get();

        return view('guru.penilaian.index', compact('jadwals'));
    }

    public function create($id_kelas)
    {
        $siswas = Siswa::where('id_kelas', $id_kelas)->get();
        $semester = Semester::latest()->first(); // Ambil semester aktif, jika ada

        return view('guru.penilaian.create', compact('siswas', 'semester', 'id_kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_semester' => 'required',
            'id_kelas' => 'required',
            'jenis_penilaian' => 'required',
            'nilai' => 'required|array',
        ]);

        $input = $request->all();
        $sudahAda = 0;
        $berhasil = 0;

        foreach ($input['nilai'] as $id_siswa => $nilai) {
            $cek = Penilaian::where('id_siswa', $id_siswa)
                ->where('id_semester', $input['id_semester'])
                ->where('jenis_penilaian', $input['jenis_penilaian'])
                ->first();

            if ($cek) {
                $sudahAda++;
                continue; // skip siswa yang sudah punya nilai
            }

            Penilaian::create([
                'id_siswa' => $id_siswa,
                'id_semester' => $input['id_semester'],
                'jenis_penilaian' => $input['jenis_penilaian'],
                'nilai' => $nilai,
                'keterangan' => $input['keterangan'][$id_siswa] ?? null,
            ]);

            $berhasil++;
        }

        return redirect()->route('guru.penilaian.index')->with('success', "$berhasil nilai berhasil disimpan. $sudahAda siswa sudah pernah dinilai.");
    }

    public function show($id_kelas, $jenis)
    {
        $penilaians = Penilaian::with('siswa')
            ->whereHas('siswa', fn($q) => $q->where('id_kelas', $id_kelas))
            ->where('jenis_penilaian', $jenis)
            ->get();

        $kelas = \App\Models\Kelas::find($id_kelas);

        return view('guru.penilaian.show', compact('penilaians', 'kelas', 'jenis'));
    }

}
