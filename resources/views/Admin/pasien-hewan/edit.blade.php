@extends('Admin.layouts.app')

@section('title', 'Edit Pasien Hewan')

@section('content')
    <div class="page-header">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('pasien-hewan.index') }}">Pasien Hewan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
          </ol>
        </nav>
        <h1 class="page-title">Edit Pasien Hewan</h1>
        <p class="page-subtitle">Form untuk memperbarui data pasien hewan.</p>
      </div>
      <div>
        <a href="{{ route('pasien-hewan.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('pasien-hewan.update', $dataPasien->pasien_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-2">
              <div class="col-md-6 mb-3">
                <label for="nama_hewan" class="form-label">Nama Hewan</label>
                <input type="text" id="nama_hewan" name="nama_hewan" class="form-control @error('nama_hewan') is-invalid @enderror" value="{{ old('nama_hewan', $dataPasien->nama_hewan) }}" required>
                @error('nama_hewan')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="jenis_hewan" class="form-label">Jenis Hewan</label>
                <select id="jenis_hewan" name="jenis_hewan" class="form-select @error('jenis_hewan') is-invalid @enderror" required>
                  <option value="">-- Pilih --</option>
                  <option value="Kucing" {{ old('jenis_hewan', $dataPasien->jenis_hewan) == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                  <option value="Anjing" {{ old('jenis_hewan', $dataPasien->jenis_hewan) == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                  <option value="Kelinci" {{ old('jenis_hewan', $dataPasien->jenis_hewan) == 'Kelinci' ? 'selected' : '' }}>Kelinci</option>
                  <option value="Burung" {{ old('jenis_hewan', $dataPasien->jenis_hewan) == 'Burung' ? 'selected' : '' }}>Burung</option>
                  <option value="Hamster" {{ old('jenis_hewan', $dataPasien->jenis_hewan) == 'Hamster' ? 'selected' : '' }}>Hamster</option>
                  <option value="Lainnya" {{ old('jenis_hewan', $dataPasien->jenis_hewan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('jenis_hewan')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="ras" class="form-label">Ras</label>
                <input type="text" id="ras" name="ras" class="form-control @error('ras') is-invalid @enderror" value="{{ old('ras', $dataPasien->ras) }}">
                @error('ras')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                  <option value="">-- Pilih --</option>
                  <option value="Jantan" {{ old('jenis_kelamin', $dataPasien->jenis_kelamin) == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                  <option value="Betina" {{ old('jenis_kelamin', $dataPasien->jenis_kelamin) == 'Betina' ? 'selected' : '' }}>Betina</option>
                </select>
                @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $dataPasien->tanggal_lahir) }}" required>
                @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control @error('nama_pemilik') is-invalid @enderror" value="{{ old('nama_pemilik', $dataPasien->nama_pemilik) }}" required>
                @error('nama_pemilik')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="no_hp_pemilik" class="form-label">No. HP Pemilik</label>
                <input type="text" id="no_hp_pemilik" name="no_hp_pemilik" class="form-control @error('no_hp_pemilik') is-invalid @enderror" value="{{ old('no_hp_pemilik', $dataPasien->no_hp_pemilik) }}" required>
                @error('no_hp_pemilik')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                  <option value="Rawat Jalan" {{ old('status', $dataPasien->status) == 'Rawat Jalan' ? 'selected' : '' }}>Rawat Jalan</option>
                  <option value="Rawat Inap" {{ old('status', $dataPasien->status) == 'Rawat Inap' ? 'selected' : '' }}>Rawat Inap</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-info">Simpan Perubahan</button>
              <a href="{{ route('pasien-hewan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
