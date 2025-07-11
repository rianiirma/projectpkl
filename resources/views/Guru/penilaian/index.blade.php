@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h2>Data Penilaian</h2>
    <a href="{{ route('guru.penilaian.create') }}" class="btn btn-primary mb-3">Tambah Penilaian</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Siswa</th>
                <th>ID Semester</th>
                <th>Jenis Penilaian</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penilaian as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->id_siswa }}</td>
                <td>{{ $item->id_semester }}</td>
                <td>{{ $item->jenis_penilaian }}</td>
                <td>{{ $item->nilai }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    <a href="{{ route('guru.penilaian.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('guru.penilaian.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('guru.penilaian.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
