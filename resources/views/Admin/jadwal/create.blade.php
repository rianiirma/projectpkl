@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Jadwal</h2>

    <form action="{{ route('admin.jadwal.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Kelas</label>
            <input type="text" name="id_kelas" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" name="id_guru" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Nama Mapel</label>
            <input type="text" name="id_mapel" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Hari</label>
            <select name="hari" class="form-control" required>
                <option value="">-- Pilih Hari --</option>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                    <option value="{{ $hari }}">{{ $hari }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
