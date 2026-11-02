@extends('Guest.layouts.app')

@section('title', 'Login - KHP Vet')

@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="text-center mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Login</h5>
                        <h1 class="display-5">Masuk ke Akun Anda</h1>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="bg-light rounded p-5">
                        <form action="{{ route('auth.authenticate') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username"
                                    class="form-control border-0 @error('username') is-invalid @enderror"
                                    style="height: 55px;" placeholder="Username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control border-0 @error('password') is-invalid @enderror"
                                    style="height: 55px;" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3">Login</button>
                            <p class="text-center mt-4 mb-0">Belum punya akun?
                                <a href="{{ route('register') }}">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
