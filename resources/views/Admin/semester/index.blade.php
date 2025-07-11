@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Data Semester</h2>
    <a href="{{ route('semester.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($semester->isEmpty())
        <p>Tidak ada data semester.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID User</th>
                    <th>ID Kelas</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semester as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->id_user }}</td>
                        <td>{{ $s->id_kelas }}</td>
                        <td>{{ $s->nisn }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->alamat }}</td>
                        <td>{{ $s->jenis_kelamin }}</td>
                        <td>{{ $s->no_telepon }}</td>
                        <td>
                            @if($s->foto)
                                <img src="{{ asset('storage/' . $s->foto) }}" alt="Foto" width="60">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('semester.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('semester.show', $s->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <form action="{{ route('semester.destroy', $s->id) }}" method="POST" style="display:inline;">
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
