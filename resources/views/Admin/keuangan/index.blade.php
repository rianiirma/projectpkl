@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Data Keuangan Siswa</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.keuangan.create') }}" class="btn btn-primary mb-3">+ Tambah Data Keuangan</a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Jenis Keuangan</th>
                <th>Tanggal Bayar</th>
                <th>Jumlah</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($keuangans as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->siswa->nama ?? '-' }}</td>
                <td>{{ $k->jeniskeuangan->nama ?? '-' }}</td>
                <td>{{ $k->tanggal_bayar }}</td>
                <td class="text-end text-nowrap" style="min-width: 120px;">
                    Rp {{ number_format($k->jumlah, 0, ',', '.') }}
                </td>
                <td>{{ $k->metode_pembayaran }}</td>
                <td>
                    @if ($k->status === 'lunas')
                    <span class="badge bg-success">Lunas</span>
                    @else
                    <span class="badge bg-warning text-dark">Belum Lunas</span>
                    @endif
                </td>
                <td class="text-nowrap">
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.keuangan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.keuangan.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data keuangan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection