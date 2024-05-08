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
                                <a href="{{ url('/logout') }}"
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
                    <button class="btn btn-sm btn-primary float-end" id="tambah-data-rw" onclick=showTambahRt()><i
                            class="bi bi-plus-lg"></i> Tambah</button>
                </div>
                <h4>Kelola Data RT</h4>
                <table class="table" id="table-rt">
                    <thead>
                        <th>No</th>
                        <th>Nama RT</th>
                        <th>Nomor RT</th>
                        <th>Nomor RW</th>
                        <th>Masa Jabatan</th>
                        <th>Alamat</th>
                        <th>Foto RT</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($dataRT as $rt)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $rt->nama_user }}
                                </td>
                                <td>{{ $rt->nomor_rt }}</td>
                                <td>{{ $rt->nomor_rw }}</td>
                                <td>{{ $rt->masa_jabatan_awal }} s/d {{ $rt->masa_jabatan_akhir }}</td>
                                <td>{{ $rt->alamat_user }}</td>
                                <td><img src="{{ asset('storage/' . $rt->foto_user) }}" alt="Foto RT" width="100"></td>
                                <td>
                                    <div style="display: flex;">
                                        <button href="" onclick=showEditRt('{{ $rt->user_id }}')
                                            class="btn btn-warning" style="margin-right: 5px;"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button href="" onclick=showDeleteRT('{{ $rt->user_id }}')
                                            class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal modal_tambah_rt" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id='modal-title'>Tambah Data RT</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/kelola-rt" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama RT: </label>
                                <div class="col-10">
                                    <select name="rt_baru" id="rt_baru" class="form-control" required>
                                        <option name="rt_baru" value="">-- Pilih Nama RT --</option>
                                        @foreach ($dataWarga as $rt)
                                            <option name="rt_baru" value="{{ $rt->user_id }}">{{ $rt->nama_user }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor RT : </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="level_nama" name="nomor_rt"
                                        value="{{ old('nomor_rt') }}" required>
                                    @error('nomor_rt')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor RW : </label>
                                <div class="col-10">
                                    <select name="nomor_rw" id="nomor_rw" class="form-control" required>
                                        <option name="nomor_rw" value="">-- Pilih RW --</option>
                                        @foreach ($dataRW as $rw)
                                            <option name="nomor_rw" value="{{ $rw->nomor_rw }}">
                                                {{ $rw->nomor_rw }} - {{ $rw->nama_user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Masa Jabatan : </label>
                                <div class="col-10">
                                    <div class="d-flex">
                                        <input type="date" class="form-control" id="level_nama"
                                            name="masa_jabatan_awal" value="{{ old('masa_jabatan_awal') }}" required>
                                        <span class="mt-2 ms-1 me-1">s/d</span>
                                        <input type="date" class="form-control" name="masa_jabatan_akhir"
                                            value="{{ old('masa_jabatan_akhir') }}" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="2" name="role_id">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick=hideTambahRt()>Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal_edit_rt" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data RT</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/kelola-rt/update" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" id="rt_lama_edit" name="rt_lama" value="">
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama RT: </label>
                                <div class="col-10">
                                    <select name="rt_baru" id="rt_baru_edit" class="form-control" required>
                                        <option name="rt_baru" value="">-- Pilih Nama RT --</option>
                                        @foreach ($dataWarga as $rt)
                                            <option name="rt_baru" value="{{ $rt->user_id }}">{{ $rt->nama_user }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor RT : </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nomor_rt_edit" name="nomor_rt"
                                        value="{{ old('nomor_rt') }}" required>
                                    @error('nomor_rt')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor RW : </label>
                                <div class="col-10">
                                    <select name="nomor_rw" id="nomor_rw_edit" class="form-control" required>
                                        <option name="nomor_rw" value="">-- Pilih RW --</option>
                                        @foreach ($dataRW as $rw)
                                            <option name="nomor_rw" value="{{ $rw->nomor_rw }}">
                                                {{ $rw->nomor_rw }} - {{ $rw->nama_user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Masa Jabatan : </label>
                                <div class="col-10">
                                    <div class="d-flex">
                                        <input type="date" class="form-control" id="masa_jabatan_awal_edit"
                                            name="masa_jabatan_awal" value="{{ old('masa_jabatan_awal') }}" required>
                                        <span class="mt-2 ms-1 me-1">s/d</span>
                                        <input type="date" class="form-control" id="masa_jabatan_akhir_edit"
                                            name="masa_jabatan_akhir" value="{{ old('masa_jabatan_akhir') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick=hideEditRt()>Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal_delete_rt" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data RT</h5>
                    </div>
                    <div class="modal-body">
                        <h4>Apakah anda yakin ingin menghapus data user ini?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="hapus_rt_id btn btn-secondary">Hapus</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            onclick=hideDeleteRT()>Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#submenu-kelola-data').addClass('show');
        $('#menu-kelola-rt').removeClass('text-dark').addClass('text-primary');
        $(document).ready(function() {
            $('.modal_tambah_rt').on("submit", function(e) {

                $('#modal-tittle').html() = 'edit';
            })
        });



        function showTambahRt() {
            $('.modal_tambah_rt').modal('show');
        }

        function hideTambahRt() {
            $('.modal_tambah_rt').modal('hide');
        }

        function showEditRt(idRT) {
            $.ajax({
                url: '/admin/kelola-rt/edit/' + idRT,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#rt_baru_edit').val(data.user_id)
                    $('#rt_lama_edit').val(data.user_id)
                    $('#nomor_rt_edit').val(data.nomor_rt)
                    $('#nomor_rw_edit').val(data.nomor_rw)
                    $('#masa_jabatan_awal_edit').val(data.masa_jabatan_awal)
                    $('#masa_jabatan_akhir_edit').val(data.masa_jabatan_akhir)
                }
            });

            $('.modal_edit_rt').modal('show');
        }

        function hideEditRt() {
            $('.modal_edit_rt').modal('hide');
        }

        function showDeleteRT(idRT) {
            $('.hapus_rt_id').attr('href', '/admin/kelola-rt/delete/' + idRT);
            $('.modal_delete_rt').modal('show');
        }

        function hideDeleteRT() {
            $('.modal_delete_rt').modal('hide');
        }
    </script>
    <script>
        new DataTable('#table-rt');
    </script>
    </div>
    </div>
@endsection
