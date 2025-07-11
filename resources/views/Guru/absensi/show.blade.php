@extends('layouts.guru')

@section('content')
<div class="container">
    <h2>Detail Absensi</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $absensi->id }}</li>
        <li class="list-group-item"><strong>ID Siswa:</strong> {{ $absensi->id_siswa }}</li>
        <li class="list-group-item"><strong>ID Jadwal:</strong> {{ $absensi->id_jadwal }}</li>
        <li class="list-group-item"><strong>Tanggal:</strong> {{ $absensi->tanggal }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $absensi->status }}</li>
    </ul>

    <a href="{{ route('guru.absensi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
