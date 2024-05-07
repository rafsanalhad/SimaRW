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
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="{{ url('/admin/profil-admin') }}"
                                    class="d-flex align-items-center gap-2 dropdown-item">
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
                                <a href="{{ url('/login') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <h1 style="font-size: 30px; font-weight: bold;">Profil Admin</h1>
        <div class="card shadow-lg">
            <h5 class="mt-3 ms-3">Profil Detail</h5>
            <div class="card-body">
                <form action="/warga/edit-profil" method="POST" class="form-horizontal row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nama_awal" class="col-form-label">Nama Lengkap:</label>
                            <div class="col-sm-12">
                                <input placeholder="Rizky Arifiansyah" type="text" class="form-control" id="nama_awal"
                                    name="nama_awal" value="{{ old('nama_awal') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nkk_warga" class="col-form-label">NKK:</label>
                            <div class="col-sm-12">
                                <input placeholder="3517133241560002" type="nkk_warga" class="form-control" id="nkk_warga"
                                    name="nkk_warga" value="{{ old('nkk_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nik_warga" class="col-form-label">NIK:</label>
                            <div class="col-sm-12">
                                <input placeholder="3517133241760001" type="nik_warga" class="form-control" id="nik_warga"
                                    name="nik_warga" value="{{ old('nik_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="email_warga" class="col-form-label">Alamat Email:</label>
                            <div class="col-sm-12">
                                <input placeholder="aryarafsan@gmail.com" type="email_warga" class="form-control"
                                    id="email_warga" name="email_warga" value="{{ old('email_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nomor_rt" class="col-form-label">RT:</label>
                            <div class="col-sm-12">
                                <input placeholder="003" type="text" class="form-control" id="nama_awal"
                                    name="nomor_rt" value="{{ old('nomor_rt') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nomor_rw" class="col-form-label">RW:</label>
                            <div class="col-sm-12">
                                <input placeholder="005" type="nomor_rw" class="form-control" id="nomor_rw"
                                    name="nomor_rw" value="{{ old('nomor_rw') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="alamat_rumah_warga" class="col-form-label">Alamat Rumah:</label>
                            <div class="col-sm-12">
                                <input placeholder="Jl.Mawar no.01 KedungLosari Jawa Tengah" type="alamat_rumah_warga"
                                    class="form-control" id="alamat_rumah_warga" name="alamat_rumah_warga"
                                    value="{{ old('alamat_rumah_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
