@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Semester</h1>

    <form action="{{ route('admin.semester.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror" value="{{ old('tahun_ajaran') }}" required>

            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <a href="{{ route('admin.semester.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
