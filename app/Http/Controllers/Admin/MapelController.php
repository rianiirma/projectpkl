<?php
namespace App\Http\Controllers\Admin;

use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    // Menampilkan semua mapel
    public function index()
    {
        $mapels = Mapel::all(['id', 'nama']);
        return view('admin.mapel.index', compact('mapels'));
    }

    // Form tambah mapel
    public function create()
    {
        return view('admin.mapel.create');
    }

    // Simpan mapel baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Mapel::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil ditambahkan.');
    }

    // Tampilkan detail mapel
    public function show(Mapel $mapel)
    {
        return view('admin.mapel.show', compact('mapel'));
    }

    // Form edit mapel
    public function edit(Mapel $mapel)
    {
        return view('admin.mapel.edit', compact('mapel'));
    }

    // Update mapel
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $mapel->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil diperbarui.');
    }

    // Hapus mapel
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil dihapus.');
    }
}
