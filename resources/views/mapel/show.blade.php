@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Mata Pelajaran</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $mapel->id }}</p>
            <p><strong>Nama:</strong> {{ $mapel->nama }}</p>
        </div>
    </div>

    <a href="{{ route('mapel.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
</div>
@endsection
