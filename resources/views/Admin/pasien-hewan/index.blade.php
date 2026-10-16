@extends('Admin.layouts.app')

@section('title', 'Data Pasien Hewan')

@section('content')
    <div class="page-header">
      <div>
        <h1 class="page-title">Data Pasien Hewan</h1>
        <p class="page-subtitle">List seluruh data pasien hewan</p>
      </div>
      <div>
        <a href="{{ route('pasien-hewan.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah Pasien Hewan</a>
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
              <table id="table-pasien-hewan" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="border-0">No</th>
                <th class="border-0">Nama Hewan</th>
                <th class="border-0">Jenis Hewan</th>
                <th class="border-0">Ras</th>
                <th class="border-0">Jenis Kelamin</th>
                <th class="border-0">Tanggal Lahir</th>
                <th class="border-0">Nama Pemilik</th>
                <th class="border-0">No. HP Pemilik</th>
                    <th class="border-0">Status</th>
                    <th class="border-0">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($dataPasien as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama_hewan }}</td>
                      <td>{{ $item->jenis_hewan }}</td>
                      <td>{{ $item->ras }}</td>
                      <td>{{ $item->jenis_kelamin }}</td>
                      <td>{{ $item->tanggal_lahir }}</td>
                      <td>{{ $item->nama_pemilik }}</td>
                      <td>{{ $item->no_hp_pemilik }}</td>
                      <td>
                        @if ($item->status == 'Rawat Jalan')
                          <span class="badge bg-success">Rawat Jalan</span>
                        @else
                          <span class="badge bg-danger">Rawat Inap</span>
                        @endif
                      </td>
                      <td class="text-nowrap">
                        <a href="{{ route('pasien-hewan.edit', $item->pasien_id) }}" class="btn btn-info btn-sm">
                          <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <form action="{{ route('pasien-hewan.destroy', $item->pasien_id) }}" method="POST" style="display:inline"
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
                      <td colspan="10" class="text-center text-muted py-4">Belum ada data.</td>
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
