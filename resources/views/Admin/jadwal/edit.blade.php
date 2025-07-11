@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Jadwal</h2>

    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>ID Kelas</label>
            <input type="text" name="id_kelas" class="form-control" value="{{ $jadwal->id_kelas }}" required>
        </div>

        <div class="form-group">
            <label>ID Guru</label>
            <input type="text" name="id_guru" class="form-control" value="{{ $jadwal->id_guru }}" required>
        </div>

        <div class="form-group">
            <label>ID Mapel</label>
            <input type="text" name="id_mapel" class="form-control" value="{{ $jadwal->id_mapel }}" required>
        </div>

        <div class="form-group">
            <label>Hari</label>
            <select name="hari" class="form-control" required>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                    <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" value="{{ $jadwal->waktu_mulai }}" required>
        </div>

        <div class="form-group">
            <label>Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" value="{{ $jadwal->waktu_selesai }}" required>
        </div>

        <div class="form-group">
            <label>Ruang</label>
            <input type="text" name="ruang" class="form-control" value="{{ $jadwal->ruang }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
