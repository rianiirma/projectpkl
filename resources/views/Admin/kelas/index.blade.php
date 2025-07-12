@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Kelas</h2>
        <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary mb-3">+ Tambah Kelas</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($kelas->isEmpty())
            <p>Tidak ada data kelas.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                        <th>Nama Kelas</th>
                        <th>Kapasitas</th>
                        <th>Nama Guru</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $k)
                        <tr>
                            <td>{{ $k->id }}</td>
                            <td>{{ $k->id_jurusan }}</td>
                            <td>{{ $k->nomor_kelas }}</td>
                            <td>{{ $k->kapasitas }}</td>
                            <td>{{ $k->id_guru }}</td>
                            <td>
                                <a href="{{ route('admin.kelas.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.kelas.destroy', $k->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
