{{-- Alert halaman guest: hasil login, registrasi, logout, dan ringkasan validasi --}}
@if (session('login_error'))
    <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">
        <i class="bi bi-x-circle me-1"></i> {{ session('login_error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('register_success'))
    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('register_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('logout_success'))
    <div class="alert alert-success alert-dismissible fade show text-start" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('logout_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show text-start" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i> Terdapat kesalahan pada isian form, silakan periksa kembali.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
