@extends('layouts.admin')

@section('title', 'Data Jurusan')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Jurusan</h1>

    <a href="{{ route('admin.jurusan.create') }}" class="btn btn-primary mb-3">+ Tambah Jurusan</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jurusans as $jurusan)
            <tr>
                <td>{{ $jurusan->id }}</td>
                <td>{{ $jurusan->nama }}</td>
                <td>
                    <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus jurusan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada data jurusan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection