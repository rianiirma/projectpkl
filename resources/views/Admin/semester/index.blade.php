@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar semester</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.semester.create') }}" class="btn btn-primary mb-3">+ Tambah semester</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($semesters as $semester)
                <tr>
                    <td>{{ $semester->id }}</td>
                    <td>{{ $semester->tahun_ajaran }}</td>
                    <td>
                        <a href="{{ route('admin.semester.edit', $semester->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.semester.destroy', $semester->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus semester ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">Tidak ada data semester.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
