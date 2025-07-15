<?php

namespace App\Http\Controllers\Guru;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::all();
        return view('guru.absensi.index', compact('absensi'));
    }

    public function create()
    {
        return view('guru.absensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_jadwal' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        Absensi::create($request->all());

        return redirect()->route('guru.absensi.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function show(Absensi $absensi)
    {
        return view('guru.absensi.show', compact('absensi'));
    }

    public function edit(Absensi $absensi)
    {
        return view('guru.absensi.edit', compact('absensi'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_jadwal' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        $absensi->update($request->all());

        return redirect()->route('guru.absensi.index')->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('guru.absensi.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}
