@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Jadwal</h2>
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($jadwals->isEmpty())
    <p>Tidak ada data jadwal.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Nama Guru</th>
                <th>Nama Mapel</th>
                <th>Hari</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $j)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $j->kelas->jurusan->nama ?? '-' }}</td>
                <td>{{ $j->guru->nama ?? '-' }}</td>
                <td>{{ $j->mapel->nama ?? '-' }}</td>
                <td>{{ $j->hari }}</td>
                <td>{{ $j->waktu_mulai }}</td>
                <td>{{ $j->waktu_selesai }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('admin.jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
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
