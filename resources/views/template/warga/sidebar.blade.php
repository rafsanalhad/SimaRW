<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ @asset('assets/images/logos/simarwlogo.png') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/warga/dashboard') }}" aria-expanded="false">
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
                    <a class="sidebar-link" href=" {{ url('/warga/bayar-iuran') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-credit-card"></i>
                        </span>
                        <span class="hide-menu">Bayar Iuran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/warga/kegiatan-warga') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-people"></i>
                        </span>
                        <span class="hide-menu">Kegiatan Warga</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/warga/umkm') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-shop-window"></i>
                        </span>
                        <span class="hide-menu">UMKM</span>
                    </a>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/warga/pengaduan') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-exclamation-circle"></i>
                        </span>
                        <span class="hide-menu">Pengaduan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/warga/pengajuan-bansos') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-envelope-paper"></i>
                        </span>
                        <span class="hide-menu">Pengajuan Bansos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/warga/penerima-bansos') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-bookmark-check"></i>
                        </span>
                        <span class="hide-menu">History Pengajuan Bansos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/warga/rekomendasi-bansos') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-person-check"></i>
                        </span>
                        <span class="hide-menu">Penerima Bansos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/warga/pengajuan-surat') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-envelope-arrow-up"></i>
                        </span>
                        <span class="hide-menu">Pengajuan Surat</span>
                    </a>
                </li>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
