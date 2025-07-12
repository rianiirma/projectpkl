@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Pengguna</h2>
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">+ Tambah Pengguna</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($users->isEmpty())
        <p>Tidak ada data pengguna.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Email Verified At</th>
                    <th>Password</th>
                    <th>Remember Token</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->role }}</td>
                        <td>{{ $u->email_verified_at }}</td>
                        <td>{{ $u->password }}</td>
                        <td>{{ $u->remember_token }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.user.destroy', $u->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengguna ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
