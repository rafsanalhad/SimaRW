@extends('template.rw.main')
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
                        <div class="dropdown dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop2">
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
        <div class="card shadow-lg">
            <div class="card-body">
                <h4>Laporan Pengaduan</h4>
                <table class="table" id='table_pengaduan'>
                    <thead>
                        <th>No</th>
                        <th>Nama Warga</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Alamat</th>
                        <th>Isi Pengaduan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $laporan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $laporan->user->nama_user }}
                                </td>
                                <td>{{ $laporan->tanggal_pengaduan }}</td>
                                <td>{{ $laporan->user->alamat_user }}</td>
                                <td>{{ $laporan->isi_pengaduan }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('tolakPengaduan', $laporan->pengaduan_id) }}" class="btn btn-danger">Tolak</a>
                                    <a href="{{ route('terimaPengaduan', $laporan->pengaduan_id) }}" class="btn btn-success">Terima</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- Modal tuk apah? --}}
    <div class="modal modal_tambah_bansos" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verifikasi Bansos</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" class="form-horizontal">
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Nama: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="bansos_nama" name="bansos_nama"
                                    value="{{ old('level_nama') }}" required>
                                @error('bansos_nama')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-2 control-label col-form-label">Alamat: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="level_nama" name="level_nama"
                                    value="{{ old('level_nama') }}" required>
                                @error('level_nama')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
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

                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/profile/user-1.jpg" alt="" width="35"
                                    height="35" class="rounded-circle">
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
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h4>Laporan Pengaduan</h4>
                            <table class="table" id='table_pengaduan'>
                                <thead>
                                    <th>No</th>
                                    <th>Nama Warga</th>
                                    <th>Alamat Warga</th>
                                    <th>Pekerjaan Warga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            Rizky Arifiansyah
                                        </td>
                                        <td>Malang</td>
                                        <td>Pengusaha</td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-danger">Ditolak</a>
                                            <a class="btn btn-success">Verifikasi</a>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

    <script>
        new DataTable('#table_pengaduan');
    </script>
    <script>
        $('#submenu-laporan-pengaduan').addClass('show');
        $('#menu-laporan-pengaduan').removeClass('text-dark').addClass('text-primary');
    </script>
@endsection

