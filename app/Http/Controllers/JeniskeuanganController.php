<?php

namespace App\Http\Controllers;

use App\Models\JenisKeuangan;
use Illuminate\Http\Request;

class JenisKeuanganController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $jeniskeuangans = JenisKeuangan::all();
        return view('Admin/jeniskeuangan.index', compact('jeniskeuangans'));
    }

    // Tampilkan form untuk tambah data
    public function create()
    {
        return view('Admin/jeniskeuangan.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        JenisKeuangan::create($request->all());

        return redirect()->route('Admin/jeniskeuangan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan detail
    public function show(JenisKeuangan $jeniskeuangan)
    {
        return view('Admin/jeniskeuangan.show', compact('jeniskeuangan'));
    }

    // Tampilkan form edit
    public function edit(JenisKeuangan $jeniskeuangan)
    {
        return view('Admin/jeniskeuangan.edit', compact('jeniskeuangan'));
    }

    // Update data
    public function update(Request $request, JenisKeuangan $jeniskeuangan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $jeniskeuangan->update($request->all());

        return redirect()->route('Admin/jeniskeuangan.index')->with('success', 'Data berhasil diupdate.');
    }

    // Hapus data
    public function destroy(JenisKeuangan $jeniskeuangan)
    {
        $jeniskeuangan->delete();

        return redirect()->route('Admin/jeniskeuangan.index')->with('success', 'Data berhasil dihapus.');
    }
}
