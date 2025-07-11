@extends('layouts.guru')

@section('content')
<div class="container">
    <h2>Detail Jadwal</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $jadwal->id }}</li>
        <li class="list-group-item"><strong>ID Kelas:</strong> {{ $jadwal->id_kelas }}</li>
        <li class="list-group-item"><strong>ID Guru:</strong> {{ $jadwal->id_guru }}</li>
        <li class="list-group-item"><strong>ID Mapel:</strong> {{ $jadwal->id_mapel }}</li>
        <li class="list-group-item"><strong>Hari:</strong> {{ $jadwal->hari }}</li>
        <li class="list-group-item"><strong>Waktu Mulai:</strong> {{ $jadwal->waktu_mulai }}</li>
        <li class="list-group-item"><strong>Waktu Selesai:</strong> {{ $jadwal->waktu_selesai }}</li>
        <li class="list-group-item"><strong>Ruang:</strong> {{ $jadwal->ruang }}</li>
    </ul>

    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
