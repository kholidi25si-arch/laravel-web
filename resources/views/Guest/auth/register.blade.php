@extends('Guest.layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="display-4">Buat akun KHP Vet</h1>
                    <p class="text-white mb-0">Isi data diri dan buat password minimal 8 karakter.
                        Sudah punya akun? <a class="text-dark fw-bold" href="{{ route('login') }}">Login di sini</a>.</p>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="bg-white rounded p-5">
                        <h2 class="mb-4 text-center">Register</h2>

                        @include('Guest.partials.alert')

                        <form action="{{ route('register.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" name="name" autofocus autocomplete="name"
                                    class="form-control bg-light @error('name') is-invalid @enderror"
                                    style="height: 55px;" value="{{ old('name') }}" placeholder="Nama lengkap">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" autocomplete="email"
                                    class="form-control bg-light @error('email') is-invalid @enderror"
                                    style="height: 55px;" value="{{ old('email') }}" placeholder="nama@email.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" autocomplete="new-password"
                                    class="form-control bg-light @error('password') is-invalid @enderror"
                                    style="height: 55px;" placeholder="Minimal 8 karakter">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    autocomplete="new-password" class="form-control bg-light" style="height: 55px;"
                                    placeholder="Ulangi password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3">Register</button>
                        </form>

                        <p class="text-center mt-4 mb-0">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
