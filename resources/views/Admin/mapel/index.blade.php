@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Mata Pelajaran</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('mapel.create') }}" class="btn btn-primary mb-3">+ Tambah Mapel</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mapels as $mapel)
                <tr>
                    <td>{{ $mapel->id }}</td>
                    <td>{{ $mapel->nama }}</td>
                    <td>
                        <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('mapel.show', $mapel->id) }}" class="btn btn-sm btn-success">Show</a>
                        <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus mapel ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">Tidak ada data mapel.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
