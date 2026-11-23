<!-- Navbar Start -->
<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary">
                    <img src="{{ asset('GuestAssets/img/Logo.png') }}" width="60px" alt="">KHP Vet</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 align-items-lg-center">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('home') }}#about" class="nav-item nav-link">About</a>
                    <a href="{{ route('home') }}#services" class="nav-item nav-link">Service</a>
                    <a href="{{ route('home') }}#team" class="nav-item nav-link">Dokter</a>
                    <a href="{{ route('home') }}#contact" class="nav-item nav-link">Contact</a>
                    <a href="{{ route('login') }}" class="nav-item nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-3 my-2 my-lg-0 {{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
