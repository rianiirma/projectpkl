@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Detail Pengguna</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
        <li class="list-group-item"><strong>Nama:</strong> {{ $user->nama }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
        <li class="list-group-item"><strong>Email Verified At:</strong> {{ $user->email_verified_at }}</li>
        <li class="list-group-item"><strong>Password (ter-enkripsi):</strong> {{ $user->password }}</li>
        <li class="list-group-item"><strong>Remember Token:</strong> {{ $user->remember_token }}</li>
    </ul>

    <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
