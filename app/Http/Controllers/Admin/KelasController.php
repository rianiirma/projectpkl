<?php
namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        $gurus = Guru::all();
        return view('admin.kelas.create', compact('jurusans', 'gurus'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_jurusan' => 'required|exists:jurusans,id',
            'nomor_kelas' => 'required',
            'kapasitas' => 'required|numeric',
            'id_guru' => 'required|exists:gurus,id',
        ]);

        Kelas::create([
            'id_jurusan' => $request->id_jurusan,
            'nomor_kelas' => $request->nomor_kelas,
            'kapasitas' => $request->kapasitas,
            'id_guru' => $request->id_guru,
        ]);

        return redirect()->route('admin.kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function show(Kelas $kelas)
    {
        return view('admin.kelas.show', compact('kelas'));
    }

    public function edit(Kelas $kelas)
    {
        $jurusans = Jurusan::all();
        $gurus = Guru::all();
        return view('admin.kelas.edit', compact('kelas', 'jurusans', 'gurus'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'id_jurusan' => 'required',
            'nomor_kelas' => 'required',
            'kapasitas' => 'required|integer',
            'id_guru' => 'required',
        ]);

        $kelas->update($request->all());

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diupdate.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
