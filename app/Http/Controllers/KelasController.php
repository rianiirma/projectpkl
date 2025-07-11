<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('Admin/kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('Admin/kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jurusan' => 'required',
            'nomor_kelas' => 'required',
            'kapasitas' => 'required|integer',
            'id_guru' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()->route('Admin/kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function show(Kelas $kelas)
    {
        return view('Admin/kelas.show', compact('kelas'));
    }

    public function edit(Kelas $kelas)
    {
        return view('Admin/kelas.edit', compact('kelas'));
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

        return redirect()->route('Admin/kelas.index')->with('success', 'Kelas berhasil diupdate.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('Admin/kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
