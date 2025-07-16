<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $guru = Auth::user();
        $mapelList = Mapel::where('id_guru', $guru->id)->get();

        $id_mapel = $request->mapel ?? $mapelList->first()?->id;
        $tanggalList = collect(range(0, 6))->map(fn($i) => now()->subDays($i)->toDateString())->reverse();

        $kelas = Kelas::where('id_guru', $guru->id)->first();
        $siswaList = $kelas ? Siswa::where('id_kelas', $kelas->id)->get() : collect();

        $absensiData = Absensi::where('id_mapel', $id_mapel)
            ->whereIn('id_siswa', $siswaList->pluck('id'))
            ->whereIn('tanggal', $tanggalList)
            ->get()
            ->groupBy(['id_siswa', 'tanggal'])
            ->map(fn($tanggal) => collect($tanggal)->map->first());

        return view('guru.absensi.index', compact('mapelList', 'siswaList', 'tanggalList', 'absensiData', 'id_mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_mapel' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,izin,sakit,alpa',
        ]);

        $absensi = Absensi::create([
            'id_siswa' => $request->id_siswa,
            'id_mapel' => $request->id_mapel,
            'id_kelas' => Siswa::find($request->id_siswa)?->id_kelas,
            'id_guru' => Auth::id(),
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true, 'id' => $absensi->id]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alpa',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }
}
