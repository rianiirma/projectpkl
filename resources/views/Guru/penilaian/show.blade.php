@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h2>Detail Penilaian</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $penilaian->id }}</p>
            <p><strong>ID Siswa:</strong> {{ $penilaian->id_siswa }}</p>
            <p><strong>ID Semester:</strong> {{ $penilaian->id_semester }}</p>
            <p><strong>Jenis Penilaian:</strong> {{ $penilaian->jenis_penilaian }}</p>
            <p><strong>Nilai:</strong> {{ $penilaian->nilai }}</p>
            <p><strong>Keterangan:</strong> {{ $penilaian->keterangan }}</p>
            <a href="{{ route('guru.penilaian.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
