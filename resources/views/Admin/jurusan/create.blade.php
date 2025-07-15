@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Jurusan</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ups!</strong> Ada kesalahan pada inputan:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.jurusan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jurusan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection