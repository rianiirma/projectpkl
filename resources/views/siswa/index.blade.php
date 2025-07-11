@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Siswa</h1>

    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">+ Tambah Siswa</a>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
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
            @forelse($siswas as $siswa)
            <tr>
                <td>{{ $siswa->id }}</td>
                <td>{{ $siswa->id_user }}</td>
                <td>{{ $siswa->id_kelas }}</td>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->no_telepon }}</td>
                <td>
                    @if ($siswa->foto)
                        <img src="{{ asset('storage/foto/' . $siswa->foto) }}" alt="Foto" width="50">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center">Data siswa belum ada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
