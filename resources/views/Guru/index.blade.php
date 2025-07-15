@extends('layouts.dashboardguru')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard Guru</h1>

    <p>Selamat datang, {{ Auth::user()->nama }}!</p>

    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Hari Ini</h5>
                    <p class="card-text fs-4">{{ $jadwalHariIni }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Kelas</h5>
                    <p class="card-text fs-4">{{ $totalKelas }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Absensi Hari Ini</h5>
                    <p class="card-text fs-4">{{ $absensiHariIni }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Penilaian</h5>
                    <p class="card-text fs-4">{{ $totalPenilaian }}</p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mt-4">Jadwal Hari Ini</h3>
    @if ($jadwals->isEmpty())
        <p class="text-muted">Tidak ada jadwal hari ini.</p>
    @else
        <ul class="list-group">
            @foreach ($jadwals as $jadwal)
                <li class="list-group-item">
                    <strong>{{ $jadwal->mapel->nama }}</strong> —
                    {{ $jadwal->kelas->jurusan->nama }} {{ $jadwal->kelas->nomor_kelas }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
