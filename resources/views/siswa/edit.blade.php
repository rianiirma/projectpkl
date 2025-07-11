@extends('layouts.admin')

@section('title', 'Edit Data Siswa')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Data Siswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan pada inputan:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_user" class="form-label">User</label>
            <select name="id_user" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $siswa->id_user == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_kelas" class="form-label">Kelas</label>
            <select name="id_kelas" class="form-control" required>
                @foreach($kelasList as $kelas)
                    <option value="{{ $kelas->id }}" {{ $siswa->id_kelas == $kelas->id ? 'selected' : '' }}>
                        {{ $kelas->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" name="nisn" value="{{ $siswa->nisn }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control">{{ $siswa->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" value="{{ $siswa->no_telepon }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            @if($siswa->foto)
                <br>
                <img src="{{ asset('storage/foto/' . $siswa->foto) }}" alt="Foto Siswa" width="100" class="mb-2">
            @endif
            <input type="file" name="foto" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
