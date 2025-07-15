@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Mata Pelajaran</h1>

    <form action="{{ route('admin.mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mapel</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $mapel->nama) }}" required>

            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <a href="{{ route('admin.mapel.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection