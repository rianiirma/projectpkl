@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Detail Guru</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $guru->id }}</p>
            <p><strong>ID User:</strong> {{ $guru->id_user }}</p>
            <p><strong>ID Kelas:</strong> {{ $guru->id_kelas }}</p>
            <p><strong>Nama:</strong> {{ $guru->nama }}</p>
            <p><strong>No Telepon:</strong> {{ $guru->no_telepon }}</p>
            <p><strong>Mapel Utama:</strong> {{ $guru->mapel_utama }}</p>
            <p><strong>Foto:</strong><br>
                @if($guru->foto)
                    <img src="{{ asset('storage/' . $guru->foto) }}" width="150">
                @else
                    Tidak ada foto
                @endif
            </p>
            <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
