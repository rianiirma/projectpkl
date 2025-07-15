@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Guru</h2>

    <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
        </div>

        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $guru->no_telepon }}" required>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            @if ($guru->foto)
            <img src="{{ asset('storage/' . $guru->foto) }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group">
            <label>Mapel Utama</label>
            <input type="text" name="mapel_utama" class="form-control" value="{{ $guru->mapel_utama }}" required>
        </div>

        <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
