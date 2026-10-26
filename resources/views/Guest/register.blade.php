@extends('Guest.layouts.app')

@section('title', 'Register - KHP Vet')

@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="text-center mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Register</h5>
                        <h1 class="display-5">Buat Akun Baru</h1>
                    </div>

                    <div class="bg-light rounded p-5">
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control border-0 @error('name') is-invalid @enderror"
                                    style="height: 55px;" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email"
                                    class="form-control border-0 @error('email') is-invalid @enderror"
                                    style="height: 55px;" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control border-0 @error('password') is-invalid @enderror"
                                    style="height: 55px;" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control border-0" style="height: 55px;" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3">Register</button>
                            <p class="text-center mt-4 mb-0">Sudah punya akun?
                                <a href="{{ route('auth.login') }}">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
