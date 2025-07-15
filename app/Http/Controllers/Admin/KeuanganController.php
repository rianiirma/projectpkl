<?php
namespace App\Http\Controllers\Admin;

use App\Models\JenisKeuangan;
use App\Models\Keuangan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeuanganController extends Controller
{
    public function create()
    {
        $siswas = Siswa::all();
        $jeniskeuangans = JenisKeuangan::all();
        return view('admin.keuangan.create', compact('siswas', 'jeniskeuangans'));
    }

    public function index()
    {
        $keuangans = \App\Models\Keuangan::with(['siswa', 'jeniskeuangan'])->get();
        return view('admin.keuangan.index', compact('keuangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_jeniskeuangan' => 'required',
            'tanggal_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'status' => 'required|in:belum lunas,lunas',
        ]);

        Keuangan::create($request->all());

        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $siswas = Siswa::all();
        $jenisKeuangans = Jeniskeuangan::all();

        return view('admin.keuangan.edit', compact('keuangan', 'siswas', 'jenisKeuangans'));
    }

    public function update(Request $request, $id)
    {
        $keuangan = Keuangan::findOrFail($id);

        $request->validate([
            'id_siswa' => 'required',
            'id_jeniskeuangan' => 'required',
            'tanggal_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'status' => 'required|in:belum lunas,lunas',
        ]);

        $keuangan->update($request->all());

        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil diupdate.');
    }

    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil dihapus.');
    }
}
