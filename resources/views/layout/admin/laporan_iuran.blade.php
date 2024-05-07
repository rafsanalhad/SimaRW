@extends('template.admin.main')
@section('content')
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>

        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-mail fs-6"></i>
                                <p class="mb-0 fs-3">My Account</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-list-check fs-6"></i>
                                <p class="mb-0 fs-3">My Task</p>
                            </a>
                            <a href="./authentication-login.html"
                                class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="container-fluid">
    {{-- <h3>Data Warga</h3> --}}
    <div class="card shadow-lg">
        <div class="card-body">
            <h4 class="mb-4">Laporan Iuran</h4>
            <hr>
            <table class="table" id="table-warga">
                <thead>
                    <th>Nama</th>
                    <th>Nominal</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($dataIuran as $i)
                        <tr>
                            <td>{{ $i->kartuKeluarga->nama_kepala_keluarga }}</td>
                            <td>Rp. 30.000</td>
                            <td>
                                @if ($i->status == 'Lunas')
                                    <span class="badge bg-success">Lunas</span>
                                @else
                                    <span class="badge bg-warning">Belum Lunas</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach      
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $('#submenu-kelola-iuran').addClass('show');
    $('#menu-laporan-iuran').removeClass('text-dark').addClass('text-primary');
</script>
@endsection