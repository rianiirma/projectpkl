@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Tambah Jadwal</h4>

    <form action="{{ route('admin.jadwal.store') }}" method="POST">
        @csrf

        <!-- Nama Kelas -->
        <div class="mb-3">
            <label for="id_kelas" class="form-label">Nama Kelas</label>
            <select name="id_kelas" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->nomor_kelas }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nama Guru -->
        <div class="mb-3">
            <label for="id_guru" class="form-label">Nama Guru</label>
            <select name="id_guru" class="form-control" required>
                <option value="">-- Pilih Guru --</option>
                @foreach ($guru as $g)
                <option value="{{ $g->id }}">{{ $g->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nama Mapel -->
        <div class="mb-3">
            <label for="id_mapel" class="form-label">Nama Mapel</label>
            <select name="id_mapel" class="form-control" required>
                <option value="">-- Pilih Mapel --</option>
                @foreach ($mapel as $m)
                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Hari -->
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" class="form-control" required>
                <option value="">-- Pilih Hari --</option>
                @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                <option value="{{ $hari }}">{{ $hari }}</option>
                @endforeach
            </select>
        </div>

        <!-- Waktu Mulai -->
        <div class="mb-3">
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" required>
        </div>

        <!-- Waktu Selesai -->
        <div class="mb-3">
            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" required>
        </div>

        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
           <button type="submit" class="btn btn-primary">Simpan</button>

    </form>
</div>
@endsection
