@extends('layouts.admin')

@section('title', 'Edit Jenis Keuangan')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Jenis Keuangan</h1>

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

    <form action="{{ route('admin.jeniskeuangan.update', $jeniskeuangan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jenis Keuangan</label>
            <input type="text" name="nama" class="form-control" value="{{ $jeniskeuangan->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required>{{ $jeniskeuangan->deskripsi }}</textarea>
        </div>

        <a href="{{ route('admin.jeniskeuangan.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
