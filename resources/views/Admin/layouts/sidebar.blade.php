  <!-- ==========================================
         START: Sidebar Component
         Highly polished, dark-green sticky navigation
         ========================================== -->
  <div class="sidebar-wrapper" id="sidebar">
    <!-- Brand Logo / Identity -->
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
    <img src="{{ asset('AdminAssets/images/Logo.png') }}" width="65px" alt="">
      <span>KHP Vet</span>
    </a>

    <!-- Navigation Menu -->
    <div class="flex-grow-1 overflow-y-auto">
      <!-- Group: Menu -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Menu</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" id="menu-overview" title="Dashboard">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Group: Components -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Data Master</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('pasien-hewan.index') }}" class="sidebar-menu-link {{ request()->routeIs('pasien-hewan.*') ? 'active' : '' }}" id="menu-pasien" title="Data Pasien Hewan">
              <i class="bi bi-clipboard2-pulse"></i>
              <span>Data Pasien Hewan</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('layanan-klinik.index') }}" class="sidebar-menu-link {{ request()->routeIs('layanan-klinik.*') ? 'active' : '' }}" id="menu-layanan" title="Data Layanan Klinik">
              <i class="bi bi-heart-pulse"></i>
              <span>Data Layanan Klinik</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('dokter.index') }}" class="sidebar-menu-link {{ request()->routeIs('dokter.*') ? 'active' : '' }}" id="menu-dokter" title="Data Dokter">
              <i class="bi bi-person-badge"></i>
              <span>Data Dokter</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('user.index') }}" class="sidebar-menu-link {{ request()->routeIs('user.*') ? 'active' : '' }}" id="menu-user" title="Data User">
              <i class="bi bi-people"></i>
              <span>Data User</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Group: Pages -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Pages</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="page-blank.html" class="sidebar-menu-link" id="menu-blankpage" title="Blank Page">
              <i class="bi bi-file-earmark"></i>
              <span>Blank Page</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="page-login.html" class="sidebar-menu-link" id="menu-loginpage" title="Login Page">
              <i class="bi bi-box-arrow-in-right"></i>
              <span>Logout</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="page-404.html" class="sidebar-menu-link" id="menu-404" title="404 Page">
              <i class="bi bi-slash-circle"></i>
              <span>Error 404</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Sidebar Profile Card (Dynamic Footer) -->
    <div class="sidebar-profile">
      <img src="{{ asset('AdminAssets/images/Logo.png') }}" alt="Administrator" class="sidebar-profile-img"
        onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
      <div class="sidebar-profile-info">
        <div class="sidebar-profile-name">Admin</div>
        <div class="sidebar-profile-email">admin@email.com</div>
      </div>
    </div>
  </div>
  <!-- ==========================================
         END: Sidebar Component
         ========================================== -->
