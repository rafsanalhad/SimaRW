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
                    <button class="btn btn-sm btn-primary float-end" id="tambah-data-rw" onclick=showTambahRw()><i
                            class="bi bi-plus-lg"></i> Tambah</button>
                </div>
                <h4>Kelola Data RW</h4>
                <table class="table" id="table-rw">
                    <thead>
                        <th>No</th>
                        <th>Nama RW</th>
                        <th>Nomor RW</th>
                        <th>Nomor RT</th>
                        <th>Masa Jabatan</th>
                        <th>Alamat</th>
                        <th>Foto RW</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($dataRW as $rw)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $rw->nama_user }}
                                </td>
                                <td>{{ $rw->nomor_rw }}</td>
                                <td>
                                    @foreach ($rw->rt as $index => $rt)
                                        {{ $rt->nomor_rt }}
                                        @if ($index < count($rw->rt) - 1)
                                            {{-- Tambahkan koma jika ini bukan iterasi terakhir --}}
                                            {{ ', ' }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $rw->masa_jabatan_awal }} s/d {{ $rw->masa_jabatan_akhir }}</td>
                                <td>{{ $rw->alamat_user }}</td>
                                <td><img class="rounded" src="{{ asset('storage/' . $rw->foto_user) }}" width="100"
                                        alt="Foto RW"></td>
                                <td>
                                    <div style="display: flex;">
                                        <button href="" onclick="showEditRw({{ $rw->user_id }})"
                                            class="btn btn-warning" style="margin-right: 5px;"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button href="" onclick="showDeleteRw({{ $rw->user_id }})"
                                            class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal modal_tambah_rw" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data RW</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('createRw') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama RW: </label>
                                <div class="col-10">
                                    <select name="rw_baru" class="form-control" id="">
                                        <option value="">-- Pilih Nama RW --</option>
                                        @foreach ($wargas as $warga)
                                            <option value="{{ $warga->user_id }}">{{ $warga->nama_user }}</option>
                                        @endforeach
                                    </select>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor RW : </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nomor_rw" name="nomor_rw"
                                        value="{{ old('nomor_rw') }}" required>
                                    @error('nomor_rw')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Masa Jabatan : </label>
                                <div class="col-10">
                                    <div class="d-flex">
                                        <input type="date" class="form-control" name="masa_jabatan_awal"
                                            value="{{ old('masa_jabatan_awal') }}" required>
                                        <span class="mt-2 ms-1 me-1">s/d</span>
                                        <input type="date" class="form-control" name="masa_jabatan_akhir"
                                            value="{{ old('masa_jabatan_akhir') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick=hideTambahRw()>Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal_edit_rw" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data RW</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateRw') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama RW: </label>
                                <div class="col-10">
                                    <select id="rw_edit" name="rw_baru" class="form-control" id="">
                                        <option value="">-- Pilih Nama RW --</option>
                                        @foreach ($wargas as $warga)
                                            <option value="{{ $warga->user_id }}">{{ $warga->nama_user }}</option>
                                        @endforeach
                                    </select>
                                    @error('level_nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor RW : </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nomor_rw_edit" name="nomor_rw"
                                        value="{{ old('nomor_rw') }}" required>
                                    @error('nomor_rw')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Masa Jabatan : </label>
                                <div class="col-10">
                                    <div class="d-flex">
                                        <input type="date" id="masa_jabatan_awal_edit" class="form-control"
                                            name="masa_jabatan_awal" value="{{ old('masa_jabatan_awal') }}" required>
                                        <span class="mt-2 ms-1 me-1">s/d</span>
                                        <input type="date" id="masa_jabatan_akhir_edit" class="form-control"
                                            name="masa_jabatan_akhir" value="{{ old('masa_jabatan_akhir') }}" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="rw_lama" name="rw_lama" value="">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick=hideEditRw()>Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal_delete_rw" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data RW</h5>
                    </div>
                    <div class="modal-body">
                        <h4>Apakah anda yakin ingin menghapus data user ini?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="hapus_rw_id btn btn-secondary">Hapus</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            onclick=hideDeleteRw()>Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function showTambahRw() {
            $('.modal_tambah_rw').modal('show');
        }

        function hideTambahRw() {
            $('.modal_tambah_rw').modal('hide');
        }

        function showEditRw(user_id) {
            $.ajax({
                url: '/admin/kelola-rw/edit/' + user_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#rw_edit').val(data.user_id);
                    $('#rw_lama').val(data.user_id);
                    $('#nomor_rw_edit').val(data.nomor_rw);
                    $('#masa_jabatan_awal_edit').val(data.masa_jabatan_awal);
                    $('#masa_jabatan_akhir_edit').val(data.masa_jabatan_akhir);
                }
            })

            $('.modal_edit_rw').modal('show');
        }

        function hideEditRw() {
            $('.modal_edit_rw').modal('hide');
        }

        function showDeleteRw(idRw) {
            $('.hapus_rw_id').attr('href', '/admin/kelola-rw/delete/' + idRw);
            $('.modal_delete_rw').modal('show');
        }

        function hideDeleteRw() {
            $('.modal_delete_rw').modal('hide');
        }
    </script>
    <script>
        new DataTable('#table-rw');
    </script>
    </div>
@endsection
