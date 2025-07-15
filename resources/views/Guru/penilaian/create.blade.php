@extends('layouts.guru')

@section('content')
<h4>Input Nilai Siswa</h4>

<form action="{{ route('guru.penilaian.store') }}" method="POST">
    @csrf
    <input type="hidden" name="id_kelas" value="{{ $id_kelas }}">
    <input type="hidden" name="id_semester" value="{{ $semester->id }}">

    <div class="form-group">
        <label for="jenis_penilaian">Jenis Penilaian</label>
        <select name="jenis_penilaian" class="form-control" required>
            <option value="UTS">UTS</option>
            <option value="UAS">UAS</option>
            <option value="Tugas">Tugas</option>
        </select>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Nilai</th>
                <th>Keterangan (opsional)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $siswa)
            @php
            $nilaiLama = \App\Models\Penilaian::where('id_siswa', $siswa->id)
            ->where('id_semester', $semester->id)
            ->where('jenis_penilaian', request()->old('jenis_penilaian', 'UTS')) // default ke UTS
            ->first();
            @endphp
            <tr>
                <td>
                    @if($nilaiLama)
                    <input type="number" class="form-control" value="{{ $nilaiLama->nilai }}" disabled>
                    <input type="hidden" name="nilai[{{ $siswa->id }}]" value="{{ $nilaiLama->nilai }}">
                    <small class="text-danger">Sudah dinilai</small>
                    @else
                    <input type="number" name="nilai[{{ $siswa->id }}]" class="form-control" required>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Simpan Nilai</button>
</form>
@endsection