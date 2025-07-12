@extends('layouts.admin')

@section('title', 'Edit Jurusan')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Jurusan</h1>

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

    <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Jurusan</label>
            <input type="text" name="nama" class="form-control" value="{{ $jurusan->nama }}" required>
        </div>

        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
