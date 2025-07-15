@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Pengguna</h2>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->nama }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
            </select>
        </div>

        <div class="form-group">
            <label>Password (Kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary mt-3">Batal</a>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection