<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::all();
        return view('Guru/penilaian.index', compact('penilaian'));
    }

    public function create()
    {
        return view('Guru/penilaian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|integer',
            'id_semester' => 'required|integer',
            'jenis_penilaian' => 'required|string|max:100',
            'nilai' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Penilaian::create($request->all());
        return redirect()->route('Guru/penilaian.index')->with('success', 'Data penilaian berhasil ditambahkan.');
    }

    public function show(Penilaian $penilaian)
    {
        return view('Guru/penilaian.show', compact('penilaian'));
    }

    public function edit(Penilaian $penilaian)
    {
        return view('Guru/penilaian.edit', compact('penilaian'));
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'id_siswa' => 'required|integer',
            'id_semester' => 'required|integer',
            'jenis_penilaian' => 'required|string|max:100',
            'nilai' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $penilaian->update($request->all());
        return redirect()->route('Guru/penilaian.index')->with('success', 'Data penilaian berhasil diupdate.');
    }

    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();
        return redirect()->route('Guru/penilaian.index')->with('success', 'Data penilaian berhasil dihapus.');
    }
}
