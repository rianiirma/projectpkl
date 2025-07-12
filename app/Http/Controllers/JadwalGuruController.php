<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('guru.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('guru.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',
            'id_guru' => 'required',
            'id_mapel' => 'required',
            'hari' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('guru.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function show(Jadwal $jadwal)
    {
        return view('guru.jadwal.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        return view('guru.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'id_kelas' => 'required',
            'id_guru' => 'required',
            'id_mapel' => 'required',
            'hari' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('guru.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('guru.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
