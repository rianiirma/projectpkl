@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Data Keuangan</h3>

    <form action="{{ route('admin.keuangan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_siswa" class="form-label">Nama Siswa</label>
            <select name="id_siswa" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswas as $siswa)
                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_jeniskeuangan" class="form-label">Jenis Keuangan</label>
            <select name="id_jeniskeuangan" class="form-select" required>
                <option value="">-- Pilih Jenis --</option>
                @foreach ($jeniskeuangans as $jenis)
                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah (Rp)</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="belum lunas">Belum Lunas</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection