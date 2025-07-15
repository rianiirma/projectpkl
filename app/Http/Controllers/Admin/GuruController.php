<?php
namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('user')->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        $users = User::where('role', 'guru')->get();
        return view('admin.guru.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'nama' => 'required|string',
            'no_telepon' => 'required',
            'mapel_utama' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_guru', 'public');
        }

        Guru::create([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'mapel_utama' => $request->mapel_utama,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan.');
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
