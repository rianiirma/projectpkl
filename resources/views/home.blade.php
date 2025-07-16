@extends('layouts.siswa') {{-- layout untuk role siswa --}}

@section('title', 'Dashboard Siswa')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold">Halo, {{ Auth::user()->nama }}</h4>

  <div class="row mt-4">
    {{-- Penilaian --}}
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="card">
        <div class="card-body text-center">
          <i class="bx bx-bar-chart-alt-2 fs-2 text-primary"></i>
          <p class="mt-2 mb-0">Penilaian</p>
          <h4>{{ $totalNilai ?? 0 }}</h4>
        </div>
      </div>
    </div>

    {{-- Absensi --}}
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="card">
        <div class="card-body text-center">
          <i class="bx bx-calendar-check fs-2 text-success"></i>
          <p class="mt-2 mb-0">Absensi</p>
          <div>
            Hadir: {{ $hadir ?? 0 }}<br>
            Sakit: {{ $sakit ?? 0 }}<br>
            Alfa: {{ $alfa ?? 0 }}
          </div>
        </div>
      </div>
    </div>

    {{-- Keuangan --}}
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="card">
        <div class="card-body text-center">
          <i class="bx bx-wallet fs-2 text-warning"></i>
          <p class="mt-2 mb-0">Status Keuangan</p>
          <h5 class="{{ $keuangan == 'Lunas' ? 'text-success' : 'text-danger' }}">
            {{ $keuangan ?? 'Belum Ada Data' }}
          </h5>
        </div>
      </div>
    </div>

    {{-- Jadwal Hari Ini --}}
    <div class="col-md-3 col-sm-6 mb-3">
      <div class="card">
        <div class="card-body text-center">
          <i class="bx bx-time fs-2 text-info"></i>
          <p class="mt-2 mb-0">Jadwal Hari Ini</p>
          @if(count($jadwalHariIni) > 0)
            @foreach($jadwalHariIni as $jadwal)
              <div>{{ $jadwal->jam }} - {{ $jadwal->mapel }}</div>
            @endforeach
          @else
            <div>Tidak ada jadwal</div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
