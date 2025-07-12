<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        return view('admin.semester.index', compact('semesters'));
    }

    public function create()
    {
        return view('admin.semester.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        Semester::create($request->only('tahun_ajaran'));

        return redirect()->route('admin.semester.index')->with('success', 'Semester berhasil ditambahkan.');
    }

    public function show($id)
    {
        $semester = Semester::findOrFail($id);
        return view('admin.semester.show', compact('semester'));
    }

    public function edit($id)
    {
        $semester = Semester::findOrFail($id);
        return view('admin.semester.edit', compact('semester'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        $semester = Semester::findOrFail($id);
        $semester->update($request->only('tahun_ajaran'));

        return redirect()->route('admin.semester.index')->with('success', 'Semester berhasil diupdate.');
    }

    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        return redirect()->route('admin.semester.index')->with('success', 'Semester berhasil dihapus.');
    }
}

