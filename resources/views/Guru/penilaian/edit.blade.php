@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h2>Edit Penilaian</h2>
    <form action="{{ route('guru.penilaian.update', $penilaian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>ID Siswa</label>
            <input type="number" name="id_siswa" class="form-control" value="{{ $penilaian->id_siswa }}" required>
        </div>
        <div class="mb-3">
            <label>ID Semester</label>
            <input type="number" name="id_semester" class="form-control" value="{{ $penilaian->id_semester }}" required>
        </div>
        <div class="mb-3">
            <label>Jenis Penilaian</label>
            <input type="text" name="jenis_penilaian" class="form-control" value="{{ $penilaian->jenis_penilaian }}" required>
        </div>
        <div class="mb-3">
            <label>Nilai</label>
            <input type="number" step="0.01" name="nilai" class="form-control" value="{{ $penilaian->nilai }}" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $penilaian->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
