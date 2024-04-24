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
                <div id="container">
                    <button class="btn btn-sm btn-primary float-end" id="tambah-data-warga" onclick=showTambahWarga()><i
                            class="bi bi-plus-lg"></i> Tambah</button>
                </div>
                <h4 class="mb-4">Kelola Data Warga</h4>
                <hr>
                <table class="table" id="table-warga">
                    <thead>
                        <th>No</th>
                        <th>Nama Warga</th>
                        <th>NIK</th>
                        <th>TTL</th>
                        <th>Jen. Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                Rizky Arifiansyah
                            </td>
                            <td>35171310297771</td>
                            <td>Sorong, 12 April 1989</td>
                            <td>Laki-laki</td>
                            <td>Islam</td>
                            <td>Jl. Soehat, Malang RT 01 RW 07</td>
                            <td>Belum Kawin</td>
                            <td>Dokter</td>
                            <td>
                                <div style="display: flex;">
                                    <button href="" onclick=showEditWarga() class="btn btn-warning"
                                        style="margin-right: 5px;"><i class="bi bi-pencil-square"></i></button>
                                    <button href="" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal modal_tambah_warga" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Warga</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="form-horizontal">
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-2 control-label col-form-label">NIK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-2 control-label col-form-label">TTL: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Jenis Kelamin: </label>
                                <div class="col-10">
                                    <select name="jenkel" id="jenisPelanggaran" class="form-control" required>
                                        <option name="jenkel" value="">Pilih Jenis Kelamin</option>
                                        <option name="jenkel" value="L">Laki-laki</option>
                                        <option name="jenkel" value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Agama: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Status: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Pekerjaan: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Alamat: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick=hideTambahWarga()>Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal_edit_warga" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Warga</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="form-horizontal">
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-2 control-label col-form-label">NIK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-2 control-label col-form-label">TTL: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Jenis Kelamin: </label>
                                <div class="col-10">
                                    <select name="jenkel" id="jenisPelanggaran" class="form-control" required>
                                        <option name="jenkel" value="">Pilih Jenis Kelamin</option>
                                        <option name="jenkel" value="L">Laki-laki</option>
                                        <option name="jenkel" value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Agama: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Status: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Pekerjaan: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Alamat: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="level_nama"
                                        value="{{ old('level_nama') }}" required>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick=hideEditWarga()>Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showTambahWarga() {
            $('.modal_tambah_warga').modal('show');
        }

        function hideTambahWarga() {
            $('.modal_tambah_warga').modal('hide');
        }

        function showEditWarga() {
            $('.modal_edit_warga').modal('show');
        }

        function hideEditWarga() {
            $('.modal_edit_warga').modal('hide');
        }
    </script>
    <script>
        new DataTable('#table-warga');
    </script>
@endsection
