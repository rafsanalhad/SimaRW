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
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" id="dashboard_menu" href=" {{ url('/rt/dashboard') }}"
                        aria-expanded="false">
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
                    <a class="sidebar-link" href="{{ url('/rt/kelola-warga') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-people"></i>
                        </span>
                        <span class="hide-menu">Kelola Warga</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/rt/kelola-umkm') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Kelola UMKM</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link menu-kelola-iuran" href="#submenu-kelola-iuran" data-bs-toggle="collapse"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-wallet"></i>
                        </span>
                        <span class="hide-menu">Kelola Iuran</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="submenu-kelola-iuran">
                        <ul class="nav flex-column sub-menu" style="margin-left: 40px;">
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="menu-kelola-iuran"
                                    href=" {{ url('/rt/kelola-iuran') }}">Kelola Iuran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="menu-laporan-iuran"
                                    href="{{ url('/rt/laporan-iuran') }}">Laporan Iuran</a>
                            </li>
                            <!-- Add more submenu items as needed -->
                        </ul>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/rt/kelola-bansos') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-cash-coin"></i>
                        </span>
                        <span class="hide-menu">Kelola Bansos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/rt/penerima-bansos') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-bookmark-check"></i>
                        </span>
                        <span class="hide-menu">History Pengajuan Bansos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/rt/rekomendasi-bansos') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-person-check"></i>
                        </span>
                        <span class="hide-menu">Penerima Bansos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link menu-laporan" href="#submenu-laporan-pengaduan" data-bs-toggle="collapse"
                        aria-expanded="false">
                        <span>
                            <i class="bi bi-chat-square-text"></i>
                        </span>
                        <span class="hide-menu">Laporan</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="submenu-laporan-pengaduan">
                        <ul class="nav flex-column sub-menu" style="margin-left: 40px;">
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="menu-laporan-pengaduan"
                                    href=" {{ url('/rt/laporan-pengaduan') }}">Laporan Pengaduan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" id="menu-history-pengaduan"
                                    href="{{ url('/rt/history-pengaduan') }}">History Pengaduan</a>
                            </li>
                            <!-- Add more submenu items as needed -->
                        </ul>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href=" {{ url('/rt/kelola-surat') }}" aria-expanded="false">
                        <span>
                            <i class="bi bi-cash-coin"></i>
                        </span>
                        <span class="hide-menu">Kelola Surat</span>
                    </a>
                </li>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<script>
    let kelolaIuran = document.getElementsByClassName('menu-kelola-iuran');
    let laporan = document.getElementsByClassName('menu-laporan');
    let sidebar = document.getElementsByClassName('sidebar-item');


    for (let i = 0; i < kelolaData.length; i++) {
        kelolaData[i].addEventListener('click', function() {
            for (let j = 0; j < sidebar.length; j++) {
                sidebar[j].classList.remove('selected');
            }
        });
    }
    for (let i = 0; i < kelolaIuran.length; i++) {
        kelolaIuran[i].addEventListener('click', function() {
            for (let j = 0; j < sidebar.length; j++) {
                sidebar[j].classList.remove('selected');
            }
        });
    }
    for (let i = 0; i < laporan.length; i++) {
        laporan[i].addEventListener('click', function() {
            for (let j = 0; j < sidebar.length; j++) {
                sidebar[j].classList.remove('selected');
            }
        });
    }
</script>
