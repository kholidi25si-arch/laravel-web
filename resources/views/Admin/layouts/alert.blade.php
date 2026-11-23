{{-- Alert hasil login di area admin (key 'login_success' dipisah dari 'success' milik CRUD) --}}
@if (session('login_success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-1"></i> {{ session('login_success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
