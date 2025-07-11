@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h2>Tambah Penilaian</h2>
    <form action="{{ route('guru.penilaian.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>ID Siswa</label>
            <input type="number" name="id_siswa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>ID Semester</label>
            <input type="number" name="id_semester" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Penilaian</label>
            <input type="text" name="jenis_penilaian" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nilai</label>
            <input type="number" step="0.01" name="nilai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
