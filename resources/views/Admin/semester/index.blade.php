@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Semester</h1>

    <a href="{{ route('admin.semester.create') }}" class="btn btn-primary mb-3">Tambah Semester</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($semesters as $semester)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $semester->tahun_ajaran }}</td>
                <td>
                    <span class="badge {{ $semester->status === 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                        {{ ucfirst($semester->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.semester.edit', $semester->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.semester.destroy', $semester->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus semester ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data semester.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
