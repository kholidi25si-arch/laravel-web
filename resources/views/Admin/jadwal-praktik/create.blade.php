@extends('Admin.layouts.app')

@section('title', 'Tambah Jadwal Praktik')

@section('content')
    <div class="page-header">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('jadwal-praktik.index') }}">Jadwal Praktik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
          </ol>
        </nav>
        <h1 class="page-title">Tambah Jadwal Praktik</h1>
        <p class="page-subtitle">Form untuk menambahkan jadwal praktik dokter baru.</p>
      </div>
      <div>
        <a href="{{ route('jadwal-praktik.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('jadwal-praktik.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
              <div class="col-md-6 mb-3">
                <label for="dokter_id" class="form-label">Dokter</label>
                <select id="dokter_id" name="dokter_id" class="form-select @error('dokter_id') is-invalid @enderror" required>
                  <option value="">-- Pilih Dokter --</option>
                  @foreach ($dataDokter as $dokter)
                    <option value="{{ $dokter->dokter_id }}" {{ old('dokter_id') == $dokter->dokter_id ? 'selected' : '' }}>{{ $dokter->nama_dokter }} - {{ $dokter->spesialisasi }}</option>
                  @endforeach
                </select>
                @error('dokter_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select id="hari" name="hari" class="form-select @error('hari') is-invalid @enderror" required>
                  @foreach ($daftarHari as $hari)
                    <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                  @endforeach
                </select>
                @error('hari')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" id="jam_mulai" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}" required>
                @error('jam_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" id="jam_selesai" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}" required>
                @error('jam_selesai')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                  <option value="Aktif" {{ old('status', 'Aktif') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                  <option value="Nonaktif" {{ old('status', 'Aktif') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('jadwal-praktik.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
