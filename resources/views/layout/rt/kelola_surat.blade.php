@extends('template.rt.main')
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
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                <h4>Kelola Surat</h4>
                <table class="table" id="table-rw">
                    <thead>
                        <th>No</th>
                        <th>Nama Pengaju</th>
                        <th>Tipe Surat</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Keterangan Surat</th>
                        <th>Aksi</th>
                        <th>Download</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                Rizky Arifiansyah
                            </td>
                            <td>Surat Pernikahan</td>
                            <td>01-01-2028</td>
                            <td>Rangkuman dari dalam surat</td>
                            <td>
                                <div style="display: flex;">
                                    <button href="#" class="btn btn-success"
                                        style="margin-right: 5px;">Setuju</button>
                                    <button href="#" class="btn btn-danger">Tolak</button>
                                </div>
                            </td>
                            <td>
                                <button href='#' class='btn btn-primary'>Download</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            new DataTable('#table-rw');
        </script>
    </div>
@endsection
