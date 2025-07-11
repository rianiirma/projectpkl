@extends('layouts.admin')

@section('title', 'Detail Jenis Keuangan')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Jenis Keuangan</h1>

    <div class="card">
        <div class="card-header">
            Informasi Jenis Keuangan
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $jeniskeuangan->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $jeniskeuangan->nama }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $jeniskeuangan->deskripsi }}</td>
                </tr>
            </table>
        </div>
    </div>

    <a href="{{ route('jeniskeuangan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
