@extends('layouts.guru') {{-- pastikan layout ini untuk guru --}}

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Jadwal Hari Ini</h4>

    <div class="row">
        @forelse($jadwals as $jadwal)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jadwal->mapel->nama ?? '-' }}</h5>
                        <p class="mb-1"><strong>Kelas:</strong> {{ $jadwal->kelas->jurusan->nama ?? '' }} {{ $jadwal->kelas->nomor_kelas ?? '' }}</p>
                        <p class="mb-1"><strong>Guru:</strong> {{ $jadwal->guru->nama ?? '-' }}</p>
                        <p class="mb-1"><strong>Hari:</strong> {{ ucfirst($jadwal->hari) }}</p>
                        <p class="mb-0"><strong>Jam:</strong> {{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Tidak ada jadwal untuk hari ini.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
