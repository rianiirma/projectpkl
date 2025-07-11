@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Detail Data Semester</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $semester->id }}</li>
        <li class="list-group-item"><strong>ID User:</strong> {{ $semester->id_user }}</li>
        <li class="list-group-item"><strong>ID Kelas:</strong> {{ $semester->id_kelas }}</li>
        <li class="list-group-item"><strong>NISN:</strong> {{ $semester->nisn }}</li>
        <li class="list-group-item"><strong>Nama:</strong> {{ $semester->nama }}</li>
        <li class="list-group-item"><strong>Alamat:</strong> {{ $semester->alamat }}</li>
        <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $semester->jenis_kelamin }}</li>
        <li class="list-group-item"><strong>No Telepon:</strong> {{ $semester->no_telepon }}</li>
        <li class="list-group-item">
            <strong>Foto:</strong><br>
            @if ($semester->foto)
                <img src="{{ asset('storage/' . $semester->foto) }}" width="120">
            @else
                Tidak ada foto
            @endif
        </li>
    </ul>

    <a href="{{ route('semester.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
