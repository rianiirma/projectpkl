@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Kelas</h2>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_jurusan">ID Jurusan</label>
            <input type="text" name="id_jurusan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nomor_kelas">Nomor Kelas</label>
            <input type="text" name="nomor_kelas" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="id_guru">ID Guru</label>
            <input type="text" name="id_guru" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
