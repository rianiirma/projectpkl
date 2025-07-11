@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Jadwal</h2>
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($jadwal->isEmpty())
        <p>Tidak ada data jadwal.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>    
                    <th>ID</th>
                    <th>ID Kelas</th>
                    <th>ID Guru</th>
                    <th>ID Mapel</th>
                    <th>Hari</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Ruang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $j)
                    <tr>
                        <td>{{ $j->id }}</td>
                        <td>{{ $j->id_kelas }}</td>
                        <td>{{ $j->id_guru }}</td>
                        <td>{{ $j->id_mapel }}</td>
                        <td>{{ $j->hari }}</td>
                        <td>{{ $j->waktu_mulai }}</td>
                        <td>{{ $j->waktu_selesai }}</td>
                        <td>{{ $j->ruang }}</td>
                        <td>
                            <a href="{{ route('admin.jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('admin.jadwal.show', $j->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" style="display:inline;">
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
