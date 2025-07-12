@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Jenis Keuangan</h1>

    <a href="{{ route('admin.jeniskeuangan.create') }}" class="btn btn-primary mb-3">+ Tambah Jenis Keuangan</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
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
                        <a href="{{ route('admin.jeniskeuangan.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.jeniskeuangan.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus jeniskeuangan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data jenis keuangan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
