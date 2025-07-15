<?php
namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['kelas', 'guru', 'mapel'])->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $guru = Guru::all();
        $mapel = Mapel::all();

        return view('admin.jadwal.create', compact('kelas', 'guru', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'id_guru' => 'required|exists:gurus,id',
            'id_mapel' => 'required|exists:mapels,id',
            'hari' => 'required|string',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function show(Jadwal $jadwal)
    {
        return view('admin.jadwal.show', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Kelas::all();
        $guru = Guru::all();
        $mapel = Mapel::all();

        return view('admin.jadwal.edit', compact('jadwal', 'kelas', 'guru', 'mapel'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'id_guru' => 'required|exists:gurus,id',
            'id_mapel' => 'required|exists:mapels,id',
            'hari' => 'required|string',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
