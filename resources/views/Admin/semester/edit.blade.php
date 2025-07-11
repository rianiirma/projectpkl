@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Data Semester</h2>

    <form action="{{ route('semester.update', $semester->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>ID User</label>
            <input type="text" name="id_user" class="form-control" value="{{ $semester->id_user }}" required>
        </div>

        <div class="form-group">
            <label>ID Kelas</label>
            <input type="text" name="id_kelas" class="form-control" value="{{ $semester->id_kelas }}" required>
        </div>

        <div class="form-group">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" value="{{ $semester->nisn }}" required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $semester->nama }}" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $semester->alamat }}</textarea>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" {{ $semester->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $semester->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $semester->no_telepon }}" required>
        </div>

        <div class="form-group">
            <label>Foto (biarkan kosong jika tidak diganti)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('semester.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
