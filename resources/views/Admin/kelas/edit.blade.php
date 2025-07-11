@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Kelas</h2>

    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_jurusan">ID Jurusan</label>
            <input type="text" name="id_jurusan" class="form-control" value="{{ $kelas->id_jurusan }}" required>
        </div>

        <div class="form-group">
            <label for="nomor_kelas">Nomor Kelas</label>
            <input type="text" name="nomor_kelas" class="form-control" value="{{ $kelas->nomor_kelas }}" required>
        </div>

        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="{{ $kelas->kapasitas }}" required>
        </div>

        <div class="form-group">
            <label for="id_guru">ID Guru</label>
            <input type="text" name="id_guru" class="form-control" value="{{ $kelas->id_guru }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
