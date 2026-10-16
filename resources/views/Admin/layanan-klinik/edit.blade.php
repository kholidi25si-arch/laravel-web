@extends('Admin.layouts.app')

@section('title', 'Edit Layanan Klinik')

@section('content')
    <div class="page-header">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('layanan-klinik.index') }}">Layanan Klinik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
          </ol>
        </nav>
        <h1 class="page-title">Edit Layanan Klinik</h1>
        <p class="page-subtitle">Form untuk memperbarui data layanan klinik.</p>
      </div>
      <div>
        <a href="{{ route('layanan-klinik.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('layanan-klinik.update', $dataLayanan->layanan_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-2">
              <div class="col-md-6 mb-3">
                <label for="nama_layanan" class="form-label">Nama Layanan</label>
                <input type="text" id="nama_layanan" name="nama_layanan" class="form-control @error('nama_layanan') is-invalid @enderror" value="{{ old('nama_layanan', $dataLayanan->nama_layanan) }}" required>
                @error('nama_layanan')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $dataLayanan->deskripsi) }}</textarea>
                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="number" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $dataLayanan->harga) }}" required min="0">
                @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="durasi_menit" class="form-label">Durasi (menit)</label>
                <input type="number" id="durasi_menit" name="durasi_menit" class="form-control @error('durasi_menit') is-invalid @enderror" value="{{ old('durasi_menit', $dataLayanan->durasi_menit) }}" required min="0">
                @error('durasi_menit')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                  <option value="Tersedia" {{ old('status', $dataLayanan->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                  <option value="Tidak Tersedia" {{ old('status', $dataLayanan->status) == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-info">Simpan Perubahan</button>
              <a href="{{ route('layanan-klinik.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
