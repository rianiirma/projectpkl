@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Kelas</h2>

    <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_jurusan" class="form-label">Nama Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="form-control" required>
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusans as $jurusan)
                <option value="{{ $jurusan->id }}" {{ $jurusan->id == $kelas->id_jurusan ? 'selected' : '' }}>
                    {{ $jurusan->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nomor_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nomor_kelas" id="nomor_kelas" class="form-control" value="{{ old('nomor_kelas', $kelas->nomor_kelas) }}" required>
        </div>

        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="{{ old('kapasitas', $kelas->kapasitas) }}" required>
        </div>

        <div class="mb-3">
            <label for="id_guru" class="form-label">Nama Guru</label>
            <select name="id_guru" id="id_guru" class="form-control" required>
                <option value="">-- Pilih Guru --</option>
                @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}" {{ $guru->id == $kelas->id_guru ? 'selected' : '' }}>
                    {{ $guru->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
