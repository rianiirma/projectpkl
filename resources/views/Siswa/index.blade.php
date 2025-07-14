<!-- resources/views/siswa/index.blade.php -->
@extends('layouts.siswa')

@section('content')
    <h3>Selamat Datang, {{ Auth::user()->nama }}</h3>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Penilaian</h5>
                    <p class="card-text">Lihat nilai kamu.</p>
                    <a href="{{ route('siswa.penilaian.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Absensi</h5>
                    <p class="card-text">Lihat absensi kamu.</p>
                    <a href="{{ route('siswa.absensi.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jadwal</h5>
                    <p class="card-text">Lihat jadwal pelajaran kamu.</p>
                    <a href="{{ route('siswa.jadwal.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Keuangan</h5>
                    <p class="card-text">Status pembayaran kamu.</p>
                    <a href="{{ route('siswa.keuangan.index') }}" class="btn btn-light btn-sm">Lihat</a>
                </div>
            </div>
        </div>
    </div>
@endsection
