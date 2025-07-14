@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Guru</h2>
    <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="id_user">Pilih Akun User Guru</label>
            <select name="id_user" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $guru->id_user == $user->id ? 'selected' : '' }}>
                        {{ $user->nama }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
        </div>
        <div class="mb-3">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $guru->no_telepon }}" required>
        </div>
        <div class="mb-3">
            <label>Foto Lama</label><br>
            @if($guru->foto)
                <img src="{{ asset('storage/' . $guru->foto) }}" width="100">
            @endif
        </div>
        <div class="mb-3">
            <label>Ganti Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <label>Mapel Utama</label>
            <input type="text" name="mapel_utama" class="form-control" value="{{ $guru->mapel_utama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
