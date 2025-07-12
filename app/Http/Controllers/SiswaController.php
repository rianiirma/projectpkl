<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::with(['kelas', 'user'])->get();
        return view('admin.siswa.index', compact('siswas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'siswa')->get();
        $kelasList = Kelas::all();
        return view('admin.siswa.create', compact('users', 'kelasList'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_kelas' => 'required|exists:kelas,id',
            'nisn' => 'required|unique:siswas,nisn',
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'required|in:L,P',
            'no_telepon' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Siswa::create($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::with(['kelas', 'user'])->findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $users = User::where('role', 'siswa')->get();
        $kelasList = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'users', 'kelasList'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_kelas' => 'required|exists:kelas,id',
            'nisn' => 'required|unique:siswas,nisn,' . $siswa->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'required|in:L,P',
            'no_telepon' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }

            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $siswa->update($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus.');

    }
}
