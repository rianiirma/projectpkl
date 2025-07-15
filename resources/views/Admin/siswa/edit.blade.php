@extends('layouts.admin')

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

    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- User --}}
        <div class="mb-3">
            <label for="id_user" class="form-label">User</label>
            <select name="id_user" id="id_user" class="form-control" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $siswa->id_user == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} ({{ $user->email }})
                </option>
                @endforeach
            </select>
        </div>

        {{-- Kelas --}}
        <div class="mb-3">
            <label for="id_kelas" class="form-label">Kelas</label>
            <select name="id_kelas" id="id_kelas" class="form-control" required>
                @foreach($kelasList as $kelas)
                <option value="{{ $kelas->id }}" {{ $siswa->id_kelas == $kelas->id ? 'selected' : '' }}>
                    {{ $kelas->nomor_kelas }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- NISN --}}
        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" name="nisn" id="nisn" value="{{ old('nisn', $siswa->nisn) }}" class="form-control" required>
        </div>

        {{-- Nama --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $siswa->nama) }}" class="form-control" required>
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $siswa->alamat) }}</textarea>
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- No Telepon --}}
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $siswa->no_telepon) }}" class="form-control">
        </div>

        {{-- Foto --}}
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label><br>
            @if($siswa->foto)
            <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
