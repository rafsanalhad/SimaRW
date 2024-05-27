@extends('template.admin.main')
@section('content')
    @include('template.admin.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                <div id="container">
                    <button class="btn btn-sm btn-primary float-end" id="tambah-data-rw" onclick=showTambahRt()><i
                            class="bi bi-plus-lg"></i> Tambah</button>
                </div>
                <h4>Kelola NKK</h4>
                <table class="table" id="table-rt">
                    <thead>
                        <th>No</th>
                        <th>Nomor NKK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Alamat KK</th>
                        <th>Jumlah Tanggungan</th>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>63227846239649</td>
                        <td>Rizky Arifiansyah</td>
                        <td>Jl. Jombang Rt 01 RW 02 Malang</td>
                        <td>3 Orang</td>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal modal_tambah_rt" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id='modal-title'>Tambah NKK</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/kelola-nkk" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor NKK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nomor_nkk" name="nomor_nkk"
                                        value="{{ old('nomor_nkk') }}" required>
                                    @error('nomor_nkk')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama Kepala Keluarga: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nama_kepala" name="nama_kepala"
                                        value="{{ old('nama_kepala') }}" required>
                                    @error('nama_kepala')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Alamat KK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="alamat_kk" name="alamat_kk"
                                        value="{{ old('alamat_kk') }}" required>
                                    @error('alamat_kk')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Jumlah Tanggungan: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="jumlah_tanggungan"
                                        name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan') }}" required>
                                    @error('jumlah_tanggungan')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
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
                        <h5 class="modal-title">Edit NKK</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/kelola-nkk/update" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor NKK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nomor_nkk" name="nomor_nkk"
                                        value="{{ old('nomor_nkk') }}" required>
                                    @error('nomor_nkk')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama Kepala Keluarga: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nama_kepala" name="nama_kepala"
                                        value="{{ old('nama_kepala') }}" required>
                                    @error('nama_kepala')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Alamat KK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="alamat_kk" name="alamat_kk"
                                        value="{{ old('alamat_kk') }}" required>
                                    @error('alamat_kk')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Jumlah Tanggungan: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="jumlah_tanggungan"
                                        name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan') }}" required>
                                    @error('jumlah_tanggungan')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
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
