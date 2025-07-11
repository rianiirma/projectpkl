@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Data Semester</h2>

    <form action="{{ route('semester.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>ID User</label>
            <input type="text" name="id_user" class="form-control" required>
        </div>

        <div class="form-group">
            <label>ID Kelas</label>
            <input type="text" name="id_kelas" class="form-control" required>
        </div>

        <div class="form-group">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('semester.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
