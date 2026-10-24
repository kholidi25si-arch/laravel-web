@extends('Admin.layouts.app')

@section('title', 'Data User')

@section('content')
    <div class="page-header">
      <div>
        <h1 class="page-title">Data User</h1>
        <p class="page-subtitle">List seluruh data user</p>
      </div>
      <div>
        <a href="{{ route('user.create') }}" class="btn btn-success text-white"><i class="bi bi-plus-lg me-1"></i> Tambah User</a>
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

    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table id="table-user" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="border-0">No</th>
                    <th class="border-0">Nama</th>
                    <th class="border-0">Email</th>
                    <th class="border-0">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($dataUser as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->email }}</td>
                      <td class="text-nowrap">
                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info btn-sm">
                          <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline"
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
                      <td colspan="4" class="text-center text-muted py-4">Belum ada data.</td>
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
