@extends('Guest.layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="display-4">Masuk ke dashboard KHP Vet</h1>
                    <p class="text-white mb-0">Kelola data pasien hewan, layanan klinik, dan dokter dari satu tempat.
                        Belum punya akun? <a class="text-dark fw-bold" href="{{ route('register') }}">Daftar di sini</a>.</p>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="bg-white rounded p-5">
                        <h2 class="mb-4 text-center">Login</h2>

                        @include('Guest.partials.alert')

                        <form action="{{ route('login.process') }}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" autofocus autocomplete="email"
                                    class="form-control bg-light @error('email') is-invalid @enderror"
                                    style="height: 55px;" value="{{ old('email') }}" placeholder="nama@email.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" autocomplete="current-password"
                                    class="form-control bg-light @error('password') is-invalid @enderror"
                                    style="height: 55px;" placeholder="Masukkan password">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3">Login</button>
                        </form>

                        <p class="text-center mt-4 mb-0">Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
