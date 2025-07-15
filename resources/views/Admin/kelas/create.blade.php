@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Kelas</h2>

    <form action="{{ route('admin.kelas.store') }}" method="POST">
        @csrf

       <div class="form-group">
           <label>Nama Jurusan</label>
           <select name="id_jurusan" class="form-control" required>
               <option value="">-- Pilih Jurusan --</option>
               @foreach ($jurusans as $jurusan)
               <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
               @endforeach
           </select>
       </div>

        <div class="form-group">
            <label for="nomor_kelas">Nama Kelas</label>
            <input type="text" name="nomor_kelas" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_guru" class="form-label">Nama Guru</label>
            <select name="id_guru" id="id_guru" class="form-control" required>
                <option value="">-- Pilih Guru --</option>
                @foreach($gurus as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection