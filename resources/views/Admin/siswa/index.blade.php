@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Siswa</h1>

    <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary mb-3">+ Tambah Siswa</a>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Kelas</th>
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
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->user->name ?? '-' }}</td>
                <td>{{ $siswa->kelas->nomor_kelas ?? '-' }}</td>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->no_telepon }}</td>
                <td>
                    @if ($siswa->foto)
                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto" width="50">
                    @else
                    <span>-</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                        </form>
                    </div>
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
