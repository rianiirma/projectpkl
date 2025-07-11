@extends('layouts.admin')

@section('title', 'Data Jenis Keuangan')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Jenis Keuangan</h1>

    <a href="{{ route('jeniskeuangan.create') }}" class="btn btn-primary mb-3">+ Tambah Jenis Keuangan</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jeniskeuangans as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="{{ route('jeniskeuangan.show', $item->id) }}" class="btn btn-sm btn-info">Lihat</a>
                        <a href="{{ route('jeniskeuangan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('jeniskeuangan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Data belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
