@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Keuangan</h3>

    <form action="{{ route('admin.keuangan.update', $keuangan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <select name="id_siswa" class="form-select" required>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ $siswa->id == $keuangan->id_siswa ? 'selected' : '' }}>
                        {{ $siswa->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Keuangan</label>
            <select name="id_jeniskeuangan" class="form-select" required>
                @foreach ($jeniskeuangans as $jenis)
                    <option value="{{ $jenis->id }}" {{ $jenis->id == $keuangan->id_jeniskeuangan ? 'selected' : '' }}>
                        {{ $jenis->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" class="form-control" value="{{ $keuangan->tanggal_bayar }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $keuangan->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control" value="{{ $keuangan->metode_pembayaran }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="belum lunas" {{ $keuangan->status == 'belum lunas' ? 'selected' : '' }}>Belum Lunas</option>
                <option value="lunas" {{ $keuangan->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
