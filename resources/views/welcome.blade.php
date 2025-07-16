@extends('layouts.auth')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 text-center">
      <h1 class="mb-3">Selamat Datang di</h1>
      <h2 class="fw-bold text-primary">Sistem Informasi Akademik</h2>
      <p class="mb-4">Silakan masuk untuk mengakses dashboard Anda.</p>
      <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
    </div>
  </div>
</div>
@endsection
