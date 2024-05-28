@extends('template.admin.main')
@section('content')
    @include('template.admin.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                <div id="container">
                    <button class="btn btn-sm btn-primary float-end" id="tambah-data-kk" onclick=showTambahKK()><i
                            class="bi bi-plus-lg"></i> Tambah</button>
                </div>
                <h4>Kelola NKK</h4>
                <table class="table" id="table-rt">
                    <thead>
                        <th>No</th>
                        <th>Nomor NKK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Alamat KK</th>
                        <th>Jumlah Anggota Keluarga</th>
                        <th>Jumlah Tanggungan</th>
                        <th>Aksi</th>
                    </thead>
                    @foreach ($dataKK as $kkPerKeluarga)
                        <tbody>
                            <td>{{ $no++ }}</td>
                            <td>{{ $kkPerKeluarga->no_kartu_keluarga }}</td>
                            <td>{{ $kkPerKeluarga->nama_kepala_keluarga }}</td>
                            <td>{{ $kkPerKeluarga->alamat_kk }}</td>
                            <td>{{ $kkPerKeluarga->user_count }} Orang</td>
                            <td>{{ $kkPerKeluarga->jumlah_tanggungan }} Orang</td>
                            <td>
                                <div style="display: flex;">
                                    <button href="" onclick=showEditKK('{{ $kkPerKeluarga->kartu_keluarga_id }}')
                                        class="btn btn-warning" style="margin-right: 5px;"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button href="" onclick=showDeleteKK('{{ $kkPerKeluarga->kartu_keluarga_id }}')
                                        class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="modal modal_tambah_kk" tabindex="-1" role="dialog">
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
                                    onclick=hideTambahKK()>Tutup</button>
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
                        <h5 class="modal-title">Hapus Data RT</h5>
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
        $('#menu-kelola-rt').removeClass('text-dark').addClass('text-primary');
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

        function showEditKK(idRT) {
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
