@extends('layouts.guru')

@section('content')
<div class="container">
    <h2>Daftar Absensi</h2>
    <a href="{{ route('guru.absensi.create') }}" class="btn btn-primary mb-3">+ Tambah Absensi</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($absensi->isEmpty())
    <p>Tidak ada data absensi.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Siswa</th>
                <th>ID Jadwal</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensi as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->id_siswa }}</td>
                <td>{{ $a->id_jadwal }}</td>
                <td>{{ $a->tanggal }}</td>
                <td>{{ $a->status }}</td>
                <td>
                    <a href="{{ route('guru.absensi.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('guru.absensi.show', $a->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <form action="{{ route('guru.absensi.destroy', $a->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection