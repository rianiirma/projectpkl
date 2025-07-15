@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="authentication-inner">
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4">
                <a href="/" class="app-brand-link gap-2">
                    <span class="app-brand-text demo text-body fw-bolder">SIAKAD</span>
                </a>
            </div>

            <h4 class="mb-2">Selamat datang kembali! 👋</h4>
            <p class="mb-4">Masuk untuk melanjutkan ke dashboard</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember-me" />
                        <label class="form-check-label" for="remember-me">Ingat saya</label>
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                </div>
            </form>

            <p class="text-center">
                <span>Belum punya akun?</span>
                <a href="{{ route('register') }}"><span>Daftar sekarang</span></a>
            </p>
        </div>
    </div>
</div>
@endsection