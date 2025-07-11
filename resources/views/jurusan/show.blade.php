@extends('layouts.admin')

@section('title', 'Detail Jurusan')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Jurusan</h1>

    <div class="card">
        <div class="card-header">
            Informasi Jurusan
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $jurusan->id }}</td>
                </tr>
                <tr>
                    <th>Nama Jurusan</th>
                    <td>{{ $jurusan->nama }}</td>
                </tr>
            </table>
        </div>
    </div>

    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
