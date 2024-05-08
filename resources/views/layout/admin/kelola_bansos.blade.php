@extends('template.admin.main')
@section('content')
@include('template.admin.header')
    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-body">
                <h4>Kelola Bansos</h4>
                <table class="table" id='table_bansos'>
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
                            <td><a href="" class="btn btn-danger">Ditolak</a></td>
                            <td><a href="" onclick='showTambahBansos()' class="btn btn-success">Verifikasi</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
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

                <div class="container-fluid">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h4>Kelola Bansos</h4>
                            <table class="table" id='table_bansos'>
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
                                        <td><a href="" class="btn btn-danger">Ditolak</a></td>
                                        <td><a href="#" onclick='showTambahWarga()'
                                                class="btn btn-success">Verifikasi</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal modal_bansos" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content d-flex">
                            <div class="modal-header">
                                <h5 class="modal-title">Verifikasi Bansos</h5>
                            </div>
                            <div class="row modal-body">
                                <div class="col-5" style="background-color: red; margin-left: 10px; height:500px;">
                                </div>
                                <div class="container">
                                    <button type="button" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                        onclick=hideTambahWarga()>Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function showTambahWarga() {
                        $('.modal_bansos').modal('show');
                    }

                    function hideTambahWarga() {
                        $('.modal_bansos').modal('hide');
                    }
                </script>


                <script>
                    new DataTable('#table_bansos');
                </script>
            @endsection
