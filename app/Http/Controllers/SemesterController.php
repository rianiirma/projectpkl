<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SemesterController extends Controller
{
    public function index()
    {
        $semester = Semester::all();
        return view('Admin/semester.index', compact('semester'));
    }

    public function create()
    {
        return view('Admin/semester.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required',
            'id_kelas' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Semester::create($validated);

        return redirect()->route('Admin/semester.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Semester $semester)
    {
        return view('Admin/semester.show', compact('semester'));
    }

    public function edit(Semester $semester)
    {
        return view('Admin/semester.edit', compact('semester'));
    }

    public function update(Request $request, Semester $semester)
    {
        $validated = $request->validate([
            'id_user' => 'required',
            'id_kelas' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($semester->foto) {
                Storage::disk('public')->delete($semester->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $semester->update($validated);

        return redirect()->route('Admin/semester.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Semester $semester)
    {
        if ($semester->foto) {
            Storage::disk('public')->delete($semester->foto);
        }

        $semester->delete();

        return redirect()->route('Admin/semester.index')->with('success', 'Data berhasil dihapus.');
    }
}
