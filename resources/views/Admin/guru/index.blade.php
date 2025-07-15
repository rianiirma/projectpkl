@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Data Guru</h2>
    <a href="{{ route('admin.guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Email User</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Foto</th>
                <th>Mapel Utama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user->email ?? '-' }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_telepon }}</td>
                <td>
                    @if($item->foto)
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="60">
                    @else
                    Tidak ada foto
                    @endif
                </td>
                <td>{{ $item->mapel_utama }}</td>
                <td>
                    <a href="{{ route('admin.guru.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.guru.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection