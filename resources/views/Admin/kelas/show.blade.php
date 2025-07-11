@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Detail Kelas</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $kelas->id }}</li>
        <li class="list-group-item"><strong>ID Jurusan:</strong> {{ $kelas->id_jurusan }}</li>
        <li class="list-group-item"><strong>Nomor Kelas:</strong> {{ $kelas->nomor_kelas }}</li>
        <li class="list-group-item"><strong>Kapasitas:</strong> {{ $kelas->kapasitas }}</li>
        <li class="list-group-item"><strong>ID Guru:</strong> {{ $kelas->id_guru }}</li>
    </ul>

    <a href="{{ route('kelas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
