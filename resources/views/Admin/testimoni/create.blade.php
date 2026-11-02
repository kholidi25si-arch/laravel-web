@extends('Admin.layouts.app')

@section('title', 'Tambah Testimoni')

@section('content')
    <div class="page-header">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('testimoni.index') }}">Testimoni</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
          </ol>
        </nav>
        <h1 class="page-title">Tambah Testimoni</h1>
        <p class="page-subtitle">Form untuk menambahkan testimoni baru.</p>
      </div>
      <div>
        <a href="{{ route('testimoni.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('testimoni.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
              <div class="col-md-6 mb-3">
                <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                <input type="text" id="nama_pengirim" name="nama_pengirim" class="form-control @error('nama_pengirim') is-invalid @enderror" value="{{ old('nama_pengirim') }}" required>
                @error('nama_pengirim')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="layanan_id" class="form-label">Layanan yang Digunakan</label>
                <select id="layanan_id" name="layanan_id" class="form-select @error('layanan_id') is-invalid @enderror" required>
                  <option value="">-- Pilih Layanan --</option>
                  @foreach ($dataLayanan as $layanan)
                    <option value="{{ $layanan->layanan_id }}" {{ old('layanan_id') == $layanan->layanan_id ? 'selected' : '' }}>{{ $layanan->nama_layanan }}</option>
                  @endforeach
                </select>
                @error('layanan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-12 mb-3">
                <label for="isi" class="form-label">Isi Testimoni</label>
                <textarea id="isi" name="isi" rows="4" class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi') }}</textarea>
                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select id="rating" name="rating" class="form-select @error('rating') is-invalid @enderror" required>
                  @for ($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" {{ (int) old('rating', '5') === $i ? 'selected' : '' }}>{{ $i }} bintang</option>
                  @endfor
                </select>
                @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                  <option value="Tampil" {{ old('status', 'Tampil') == 'Tampil' ? 'selected' : '' }}>Tampil</option>
                  <option value="Sembunyi" {{ old('status', 'Tampil') == 'Sembunyi' ? 'selected' : '' }}>Sembunyi</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('testimoni.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
