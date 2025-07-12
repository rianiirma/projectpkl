<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'foto' => 'nullable|image|max:2048',
            'mapel_utama' => 'required|string|max:100',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        Guru::create($data);
        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function show(Guru $guru)
    {
        return view('admin.guru.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'foto' => 'nullable|image|max:2048',
            'mapel_utama' => 'required|string|max:100',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        $guru->update($data);
        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil diupdate');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();
        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dihapus');
    }
}
