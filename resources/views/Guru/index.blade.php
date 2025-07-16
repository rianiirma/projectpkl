@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Dashboard Guru</h4>
    <h5>Selamat datang, {{ $guru->nama ?? '!' }}</h5>
    <div class="row">
        <!-- Total Kelas -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bx bx-buildings" style="font-size: 2rem; color: #28a745;"></i>
                    </div>
                    <h5 class="card-title">Total Kelas</h5>
                    <h3>{{ $totalKelas }}</h3>
                </div>
            </div>
        </div>

        <!-- Absensi Hari Ini -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bx bx-check-circle" style="font-size: 2rem; color: #ffc107;"></i>
                    </div>
                    <h5 class="card-title">Absensi Hari Ini</h5>
                    <h3>{{ $jumlahAbsensiHariIni }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Penilaian -->
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bx bx-book" style="font-size: 2rem; color: #dc3545;"></i>
                    </div>
                    <h5 class="card-title">Total Penilaian</h5>
                    <h3>{{ $jumlahPenilaian }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
