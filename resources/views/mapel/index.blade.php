@extends('layouts.app')

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
            </tr>
        </thead>
        <tbody>
            @forelse ($mapels as $mapel)
                <tr>
                    <td>{{ $mapel->id }}</td>
                    <td>{{ $mapel->nama }}</td>
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
