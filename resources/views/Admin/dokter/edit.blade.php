@extends('Admin.layouts.app')

@section('title', 'Edit Dokter')

@section('content')
    <div class="page-header">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('dokter.index') }}">Dokter</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
          </ol>
        </nav>
        <h1 class="page-title">Edit Dokter</h1>
        <p class="page-subtitle">Form untuk memperbarui data dokter.</p>
      </div>
      <div>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('dokter.update', $dataDokter->dokter_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-2">
              <div class="col-md-6 mb-3">
                <label for="nama_dokter" class="form-label">Nama Dokter</label>
                <input type="text" id="nama_dokter" name="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror" value="{{ old('nama_dokter', $dataDokter->nama_dokter) }}" required>
                @error('nama_dokter')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                <input type="text" id="spesialisasi" name="spesialisasi" class="form-control @error('spesialisasi') is-invalid @enderror" value="{{ old('spesialisasi', $dataDokter->spesialisasi) }}" required>
                @error('spesialisasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="no_hp" class="form-label">No. HP</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $dataDokter->no_hp) }}" required>
                @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                  <option value="Aktif" {{ old('status', $dataDokter->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                  <option value="Nonaktif" {{ old('status', $dataDokter->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-info">Simpan Perubahan</button>
              <a href="{{ route('dokter.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
