@extends('layouts.guru')

@section('content')
<div class="container">
    <h2>Edit Absensi</h2>

    <form action="{{ route('guru.absensi.update', $absensi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>ID Siswa</label>
            <input type="text" name="id_siswa" class="form-control" value="{{ $absensi->id_siswa }}" required>
        </div>

        <div class="form-group">
            <label>ID Jadwal</label>
            <input type="text" name="id_jadwal" class="form-control" value="{{ $absensi->id_jadwal }}" required>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $absensi->tanggal }}" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="Alpha" {{ $absensi->status == 'Alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('guru.absensi.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
