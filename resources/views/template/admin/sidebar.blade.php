<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="/admin" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Menu</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="#submenu-kelola-data" data-bs-toggle="collapse" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Kelola Data</span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="submenu-kelola-data">
            <ul class="nav flex-column sub-menu" style="margin-left: 40px;">
              <li class="nav-item">
                <a class="nav-link" href=" {{ url('/admin/kelola-warga') }}">Kelola Warga</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/kelola-rt') }}">Kelola RT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/kelola-rw') }}">Kelola RW</a>
              </li>
              <!-- Add more submenu items as needed -->
            </ul>
          </div>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="/admin/kelola-umkm" aria-expanded="false">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Kelola UMKM</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="/admin/kelola-surat" aria-expanded="false">
            <span>
              <i class="ti ti-typography"></i>
            </span>
            <span class="hide-menu">Kelola Surat</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>