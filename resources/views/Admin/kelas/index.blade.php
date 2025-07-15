@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Kelas</h2>
    <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary mb-3">+ Tambah Kelas</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($kelas->isEmpty())
    <div class="alert alert-info">Tidak ada data kelas.</div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Nama Kelas</th>
                <th>Kapasitas</th>
                <th>Nama Guru</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $index => $k)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $k->jurusan->nama ?? '-' }}</td>
                <td>{{ $k->nomor_kelas }}</td>
                <td>{{ $k->kapasitas }}</td>
                <td>{{ $k->guru->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.kelas.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.kelas.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
