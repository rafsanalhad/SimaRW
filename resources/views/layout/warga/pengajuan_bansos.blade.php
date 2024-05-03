@extends('template.warga.main')
@section('content')
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                        <i class="ti ti-bell-ringing"></i>
                        <div class="notification bg-primary rounded-circle"></div>
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
                                <a href="{{ url('/warga/profil-warga') }}"
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
        <h1 style="font-size: 30px; font-weight: bold;">Form Pengaduan</h1>
        <div class="card shadow-lg">
            <h5 class="mt-3 ms-3">Isi Data Pengaduan</h5>
            <div class="card-body">
                <form action="/warga/edit-profil" method="POST" class="form-horizontal row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nama_awal" class="col-form-label">Nama Lengkap:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Nama Lengkap Anda" type="text" class="form-control"
                                    id="nama_awal" name="nama_awal" value="{{ old('nama_awal') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nkk_warga" class="col-form-label">NKK:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Nomor NKK Anda" type="nkk_warga" class="form-control"
                                    id="nkk_warga" name="nkk_warga" value="{{ old('nkk_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nik_warga" class="col-form-label">NIK:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan NIK Anda" type="nik_warga" class="form-control" id="nik_warga"
                                    name="nik_warga" value="{{ old('nik_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="pekerjaan_warga" class="col-form-label">Pekerjaan:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Pekerjaan Anda" type="pekerjaan_warga" class="form-control"
                                    id="pekerjaan_warga" name="pekerjaan_warga" value="{{ old('pekerjaan_warga') }}"
                                    required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="gaji_warga" class="col-form-label">Gaji:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Rentang Gaji anda" type="gaji_warga" class="form-control"
                                    id="gaji_warga" name="gaji_warga" value="{{ old('gaji_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="tanggungan_warga" class="col-form-label">Jumlah Tanggungan:</label>
                            <div class="col-sm-12">
                                <input placeholder="Contoh: (1 istri,1 anak)" type="tanggungan_warga"
                                    class="form-control" id="tanggungan_warga" name="tanggungan_warga"
                                    value="{{ old('tanggungan_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nomor_rt" class="col-form-label">RT:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Nomor RT" type="text" class="form-control"
                                    id="nama_awal" name="nomor_rt" value="{{ old('nomor_rt') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nomor_rw" class="col-form-label">RW:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Nomor RW" type="nomor_rw" class="form-control"
                                    id="nomor_rw" name="nomor_rw" value="{{ old('nomor_rw') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="upload_sktm" class="col-form-label">Upload SKTM:</label>
                            <div class="col-12">
                                <input type="file" class="form-control-file" id="upload_sktm" name="upload_sktm"
                                    required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group row">
                            <label for="upload_sktm" class="col-form-label">Alamat Rumah:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Alamat Lengkap Anda" type="upload_sktm" class="form-control"
                                    id="alamat_rumah_warga" name="alamat_rumah_warga"
                                    value="{{ old('alamat_rumah_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="alasan_warga" class="col-form-label">Alasan Membutuhkan Bansos:</label>
                            <div class="col-sm-12">
                                <textarea placeholder="Masukkan detail alasan anda membutuhkan bansos" type="alasan_warga" class="form-control"
                                    id="alasan_warga" name="alasan_warga" value="{{ old('alasan_warga') }}" rows="7px" required></textarea>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- HTML -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mt-3" id="btnAjukanBansos">Ajukan Bansos</button>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById("btnAjukanBansos").addEventListener("click", function() {
            Swal.fire({
                title: "Berhasil!",
                text: "Anda Telah Berhasil Mengajukan Bansos",
                icon: "success"
            });
        });
    </script>
@endsection
