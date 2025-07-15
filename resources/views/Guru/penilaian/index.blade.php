@extends('layouts.guru')

@section('content')
<h4>Pilih Kelas untuk Input Nilai</h4>
<ul>
    @foreach ($jadwals as $jadwal)
    <li>
        <a href="{{ route('guru.penilaian.create', $jadwal->kelas->id) }}">
            {{ $jadwal->kelas->nama }}
        </a>
    </li>
    @endforeach
</ul>
@endsection