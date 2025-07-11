@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Daftar Kelas</h2>
        <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">+ Tambah Kelas</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($kelas->isEmpty())
            <p>Tidak ada data kelas.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Jurusan</th>
                        <th>Nomor Kelas</th>
                        <th>Kapasitas</th>
                        <th>ID Guru</th>
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
                                <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('kelas.show', $k->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline;">
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
