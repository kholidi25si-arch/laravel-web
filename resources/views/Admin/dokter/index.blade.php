@extends('Admin.layouts.app')

@section('title', 'Data Dokter')

@section('content')
    <div class="page-header">
      <div>
        <h1 class="page-title">Data Dokter</h1>
        <p class="page-subtitle">List seluruh data dokter</p>
      </div>
      <div>
        <a href="{{ route('dokter.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Dokter</a>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table id="table-dokter" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="border-0">No</th>
                <th class="border-0">Nama Dokter</th>
                <th class="border-0">Spesialisasi</th>
                <th class="border-0">No. HP</th>
                    <th class="border-0">Status</th>
                    <th class="border-0">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($dataDokter as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama_dokter }}</td>
                      <td>{{ $item->spesialisasi }}</td>
                      <td>{{ $item->no_hp }}</td>
                      <td>
                        @if ($item->status == 'Aktif')
                          <span class="badge bg-success">Aktif</span>
                        @else
                          <span class="badge bg-danger">Nonaktif</span>
                        @endif
                      </td>
                      <td class="text-nowrap">
                        <a href="{{ route('dokter.edit', $item->dokter_id) }}" class="btn btn-info btn-sm">
                          <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <form action="{{ route('dokter.destroy', $item->dokter_id) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash me-1"></i> Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center text-muted py-4">Belum ada data.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
