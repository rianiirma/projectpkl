@extends('layouts.admin')

@section('title', 'Detail Siswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Siswa</h1>

    <div class="card">
        <div class="card-header">
            Informasi Lengkap Siswa
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $siswa->id }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $siswa->user->name }} ({{ $siswa->user->email }})</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>{{ $siswa->kelas->nama_kelas }}</td>
                </tr>
                <tr>
                    <th>NISN</th>
                    <td>{{ $siswa->nisn }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $siswa->nama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $siswa->alamat }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <th>No Telepon</th>
                    <td>{{ $siswa->no_telepon }}</td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>
                        @if ($siswa->foto)
                            <img src="{{ asset('storage/foto/' . $siswa->foto) }}" alt="Foto Siswa" width="100">
                        @else
                            Tidak ada foto.
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
