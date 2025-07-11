@extends('layouts.guru')

@section('content')
<div class="container">
    <h2>Tambah Absensi</h2>

    <form action="{{ route('guru.absensi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>ID Siswa</label>
            <input type="text" name="id_siswa" class="form-control" required>
        </div>

        <div class="form-group">
            <label>ID Jadwal</label>
            <input type="text" name="id_jadwal" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpha">Alpha</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
        <a href="{{ route('guru.absensi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
