@extends('template.admin.main')
@section('content')
    @include('template.admin.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="container d-flex justify-content-end align-items-center mb-2" style="position: relative;">
                    <div style="position: absolute; top: 10px; right: 10px;" class="d-flex align-items-center">
                        <a href="/admin/download-nkk">
                            <img style="height: 30px; width: 30px;" src="../assets/images/logos/excel.png"
                                alt="gambar convert excel">
                        </a>
                        <button class="btn btn-sm btn-primary ms-2" id="tambah-data-kk" onclick="showTambahKK()">
                            <i class="bi bi-plus-lg"></i> Tambah
                        </button>
                    </div>
                </div>
                <h4>Kelola NKK</h4>
                <hr>
                <table class="table" id="table-rt">
                    <thead>
                        <th>No</th>
                        <th>Nomor NKK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Alamat KK</th>
                        <th>Jumlah Anggota Keluarga</th>
                        <th>Kondisi Rumah</th>
                        <th>Jumlah Tanggungan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                            @foreach ($dataKK as $kkPerKeluarga)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kkPerKeluarga->no_kartu_keluarga }}</td>
                            <td>{{ $kkPerKeluarga->nama_kepala_keluarga }}</td>
                            <td>{{ $kkPerKeluarga->alamat_kk }}</td>
                            <td>{{ $kkPerKeluarga->user_count }} Orang</td>
                            <td>{{ $kkPerKeluarga->kondisi_rumah }}</td>
                            <td>{{ $kkPerKeluarga->jumlah_tanggungan }} Tanggungan</td>
                            <td>
                                <div style="display: flex;">
                                    <button href="" onclick=showEditKK('{{ $kkPerKeluarga->kartu_keluarga_id }}')
                                        class="btn btn-warning" style="margin-right: 5px;"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button href="" onclick=showDeleteKK('{{ $kkPerKeluarga->kartu_keluarga_id }}')
                                        class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        <div class="modal modal_tambah_kk" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id='modal-title'>Tambah KK</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/kelola-nkk" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor NKK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nomor_nkk" name="no_kartu_keluarga"
                                        value="{{ old('nomor_nkk') }}" required>
                                    @error('nomor_nkk')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama Kepala Keluarga: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nama_kepala" name="nama_kepala_keluarga"
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
                                <label class="col-2 control-label col-form-label">Kondisi Rumah: </label>
                                <div class="col-10">
                                    <select class="form-control" name="kondisi_rumah" id="kondisi_rumah">
                                        <option value="">-- Pilih Kondisi Rumah Keluarga --</option>
                                        <option value="Sangat Bagus">Sangat Bagus</option>
                                        <option value="Bagus">Bagus</option>
                                        <option value="Sedang">Cukup</option>
                                        <option value="Buruk">Buruk</option>
                                        <option value="Sangat Buruk">Sangat Buruk</option>
                                    </select>
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
                                    onclick=hideTambahKK()>Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal_edit_kk" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit KK</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/kelola-nkk/update/" id="edit_kk_form" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nomor NKK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nomor_nkk_edit" name="no_kartu_keluarga"
                                        value="{{ old('nomor_nkk') }}" required>
                                    @error('nomor_nkk')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Nama Kepala Keluarga: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nama_kepala_edit" name="nama_kepala_keluarga"
                                        value="{{ old('nama_kepala') }}" required>
                                    @error('nama_kepala')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Alamat KK: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="alamat_kk_edit" name="alamat_kk"
                                        value="{{ old('alamat_kk') }}" required>
                                    @error('alamat_kk')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Kondisi Rumah: </label>
                                <div class="col-10">
                                    <select class="form-control" name="kondisi_rumah" id="kondisi_rumah_edit">
                                        <option value="">-- Pilih Kondisi Rumah Keluarga --</option>
                                        <option value="Sangat Bagus">Sangat Bagus</option>
                                        <option value="Bagus">Bagus</option>
                                        <option value="Sedang">Cukup</option>
                                        <option value="Buruk">Buruk</option>
                                        <option value="Sangat Buruk">Sangat Buruk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-2 control-label col-form-label">Jumlah Tanggungan: </label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="jumlah_tanggungan_edit"
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
                                    onclick=hideEditKK()>Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal_delete_kk" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data KK</h5>
                    </div>
                    <div class="modal-body">
                        <h4>Apakah anda yakin ingin menghapus data user ini?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="hapus_kk_id btn btn-secondary">Hapus</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            onclick=hideDeleteKK()>Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#submenu-kelola-data').addClass('show');
        $('#menu-kelola-nkk').removeClass('text-dark').addClass('text-primary');
        $(document).ready(function() {
            $('.modal_tambah_rt').on("submit", function(e) {

                $('#modal-tittle').html() = 'edit';
            })
        });



        function showTambahKK() {
            $('.modal_tambah_kk').modal('show');
        }

        function hideTambahKK() {
            $('.modal_tambah_kk').modal('hide');
        }

        function showEditKK(idKK) {
            $.ajax({
                url: '/admin/kelola-nkk/edit/' + idKK,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#nomor_nkk_edit').val(data.no_kartu_keluarga)
                    $('#nama_kepala_edit').val(data.nama_kepala_keluarga)
                    $('#alamat_kk_edit').val(data.alamat_kk)
                    $('#jumlah_tanggungan_edit').val(data.jumlah_tanggungan)
                    $('#kondisi_rumah_edit').val(data.kondisi_rumah)
                }
            });

            $('#edit_kk_form').attr('action', '/admin/kelola-nkk/update/' + idKK)

            $('.modal_edit_kk').modal('show');
        }

        function hideEditKK() {
            $('.modal_edit_kk').modal('hide');
        }

        function showDeleteKK(idKK) {
            $('.hapus_kk_id').attr('href', '/admin/kelola-nkk/delete/' + idKK);
            $('.modal_delete_kk').modal('show');
        }

        function hideDeleteKK() {
            $('.modal_delete_kk').modal('hide');
        }
    </script>
    <script>
        new DataTable('#table-rt');
    </script>
    </div>
    </div>
@endsection
