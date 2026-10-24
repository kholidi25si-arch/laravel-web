@extends('Admin.layouts.app')

@section('title', 'Tambah User')

@section('content')
    <div class="page-header">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
          </ol>
        </nav>
        <h1 class="page-title">Tambah User</h1>
        <p class="page-subtitle">Form untuk menambahkan data user baru.</p>
      </div>
      <div>
        <a href="{{ route('user.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
      </div>
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

    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Terdapat kesalahan pada isian form, silakan periksa kembali.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
              <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
