@extends('template.admin.main')
@section('content')
    @include('template.admin.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="container d-flex justify-content-end align-items-center" style="position: relative;">
                    <div style="position: absolute; top: 10px; right: 10px;" class="d-flex align-items-center">
                        <a href="/admin/download-warga">
                            <img style="height: 30px; width: 30px;" src="../assets/images/logos/excel.png"
                                alt="gambar convert excel">
                        </a>
                        <button class="btn btn-sm btn-primary ms-2" id="tambah-data-warga" onclick="showTambahWarga()">
                            <i class="bi bi-plus-lg"></i> Tambah
                        </button>
                    </div>
                </div>

                <h4 class="mb-4">Kelola Data Warga</h4>
                <hr>
                <div class="table-responsive">
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
                            <th>Foto User</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($dataWarga as $warga)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $warga->nama_user }}</td>
                                    <td>{{ $warga->nik_user }}</td>
                                    <td>{{ $warga->tempat }}, {{ $warga->tanggal_lahir }}</td>
                                    <td>{{ $warga->gender }}</td>
                                    <td>{{ $warga->agama }}</td>
                                    <td>{{ $warga->kartuKeluarga->alamat_kk }}</td>
                                    <td>{{ $warga->status_kawin }}</td>
                                    <td>{{ $warga->pekerjaan_user }}</td>
                                    <td><img class="rounded" src="{{ asset('storage/' . $warga->foto_user) }}"
                                            alt="Foto User" width="100" height="100"></td>
                                    <td>
                                        <div style="display: flex;">
                                            <button href="" onclick="showEditWarga('{{ $warga->user_id }}')"
                                                class="btn btn-warning" style="margin-right: 5px;"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button href="" onclick="showDeleteWarga('{{ $warga->user_id }}')"
                                                class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal_tambah_warga" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Warga</h5>
                </div>
                <div class="modal-body">
                    <form action="/admin/kelola-warga" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">NKK: </label>
                            <div class="col-10">
                                <select name="kartu_keluarga_id" id="kartu_keluarga_id" class="form-control" required>
                                    <option name="kartu_keluarga_id" value="">-- Pilih KK --</option>
                                    @foreach ($dataKK as $kk)
                                        <option name="kartu_keluarga_id" value="{{ $kk->kartu_keluarga_id }}">
                                            {{ $kk->nama_kepala_keluarga }} - {{ $kk->no_kartu_keluarga }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Nama: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="nama_user" name="nama_user"
                                    value="{{ old('nama_user') }}" required>
                                @error('nama_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Email User: </label>
                            <div class="col-10">
                                <input type="email" class="form-control" id="email_user" name="email_user"
                                    value="{{ old('email_user') }}" required>
                                @error('email_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-2 control-label col-form-label">NIK: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="nik_user" name="nik_user"
                                    value="{{ old('nik_user') }}" required>
                                @error('nik_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-2 control-label col-form-label">Tempat Lahir: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="tempat" name="tempat"
                                    value="{{ old('tempat') }}" required>
                                @error('tempat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-2 control-label col-form-label">Tanggal Lahir: </label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Jenis Kelamin: </label>
                            <div class="col-10">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option name="gender" value="">-- Pilih Jenis Kelamin --</option>
                                    <option name="gender" value="Laki-Laki">Laki-laki</option>
                                    <option name="gender" value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Agama: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="agama" name="agama"
                                    value="{{ old('agama') }}" required>
                                @error('agama')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Status Kawin: </label>
                            <div class="col-10">
                                <select name="status_kawin" id="status_kawin" class="form-control" required>
                                    <option name="status_kawin" value="">-- Pilih Status Kawin --</option>
                                    <option name="status_kawin" value="Kawin">Kawin</option>
                                    <option name="status_kawin" value="Belum Kawin">Belum Kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Pekerjaan: </label>
                            <div class="col-10">
                                <select class="form-control" name="pekerjaan_user" id="pekerjaan_user">
                                    <option value="">-- Pilih Pekerjaan Warga --</option>
                                    <option value="PNS">PNS</option>
                                    <option value="TNI">TNI</option>
                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Sopir">Sopir</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Pekerjaan Lainnya">Pekerjaan Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Gaji Warga: </label>
                            <div class="col-10">
                                <input type="number" class="form-control" id="gaji_user" name="gaji_user"
                                    value="{{ old('gaji_user') }}" required>
                                @error('gaji_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Alamat: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="alamat_user" name="alamat_user"
                                    value="{{ old('alamat_user') }}" required>
                                @error('alamat_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Nomor RT: </label>
                            <div class="col-10">
                                <select class="form-control" name="nomor_rt" id="nomor_rt">
                                    <option value="">-- Pilih Nomor RT --</option>
                                    <option value="1">RT 01</option>
                                    <option value="2">RT 02</option>
                                    <option value="3">RT 03</option>
                                    <option value="4">RT 04</option>
                                    <option value="5">RT 05</option>
                                </select>
                                @error('nomor_rt')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Nomor RW: </label>
                            <div class="col-10">
                                <input type="hidden" name="nomor_rw" value="5">
                                <input type="text" class="form-control" id="nomor_rw" name=""
                                    value="5" disabled>
                                @error('nomor_rw')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" value="4" name="role_id">

                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Upload Foto: </label>
                            <div class="col-10 mt-1">
                                <input type="file" class="form-control" id="upload_foto" name="foto_user"
                                    accept="image/*" required>
                                @error('upload_foto')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick=hideTambahWarga()>Tutup</button>
                        </div>
                    </form>
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
                    <form action="" id="editWarga" method="POST" class="form-horizontal"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">NKK: </label>
                            <div class="col-10">
                                <select name="kartu_keluarga_id" id="kartu_keluarga_id_edit" class="form-control"
                                    required>
                                    <option name="kartu_keluarga_id" value="">-- Pilih KK --</option>
                                    @foreach ($dataKK as $kk)
                                        <option name="kartu_keluarga_id" value="{{ $kk->kartu_keluarga_id }}">
                                            {{ $kk->nama_kepala_keluarga }} - {{ $kk->no_kartu_keluarga }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Nama: </label>
                            <div class="col-10">
                                <input type="hidden" name="nama_user_lama" id="nama_user_lama">
                                <input type="hidden" name="nama_kepala_keluarga" id="nama_kepala_keluarga">
                                <input type="text" class="form-control" id="nama_user_edit" name="nama_user"
                                    value="{{ old('nama_user') }}" required>
                                @error('nama_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Email User: </label>
                            <div class="col-10">
                                <input type="email" class="form-control" id="email_user_edit" name="email_user"
                                    value="{{ old('email_user') }}" required>
                                @error('email_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-2 control-label col-form-label">NIK: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="nik_user_edit" name="nik_user"
                                    value="{{ old('nik_user') }}" required>
                                @error('nik_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-2 control-label col-form-label">Tempat Lahir: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="tempat_edit" name="tempat"
                                    value="{{ old('tempat') }}" required>
                                @error('tempat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-2 control-label col-form-label">Tanggal Lahir: </label>
                            <div class="col-10">
                                <input type="date" class="form-control" id="tanggal_lahir_edit" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Jenis Kelamin: </label>
                            <div class="col-10">
                                <select name="gender" id="gender_edit" class="form-control" required>
                                    <option name="gender" value="">-- Pilih Jenis Kelamin --</option>
                                    <option name="gender" value="Laki-Laki">Laki-laki</option>
                                    <option name="gender" value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Agama: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="agama_edit" name="agama"
                                    value="{{ old('agama') }}" required>
                                @error('agama')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Status Kawin: </label>
                            <div class="col-10">
                                <select name="status_kawin" id="status_kawin_edit" class="form-control" required>
                                    <option name="status_kawin" value="">-- Pilih Status Kawin --</option>
                                    <option name="status_kawin" value="Kawin">Kawin</option>
                                    <option name="status_kawin" value="Belum Kawin">Belum Kawin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Pekerjaan: </label>
                            <div class="col-10">
                                <select class="form-control" name="pekerjaan_user" id="pekerjaan_user_edit">
                                    <option value="">-- Pilih Pekerjaan Warga --</option>
                                    <option value="PNS">PNS</option>
                                    <option value="TNI">TNI</option>
                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Sopir">Sopir</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option value="Pekerjaan Lainnya">Pekerjaan Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Gaji Warga: </label>
                            <div class="col-10">
                                <input type="number" class="form-control" id="gaji_user_edit" name="gaji_user"
                                    value="{{ old('gaji_user') }}" required>
                                @error('gaji_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Alamat: </label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="alamat_user_edit" name="alamat_user"
                                    value="{{ old('alamat_user') }}" required>
                                @error('alamat_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Nomor RT: </label>
                            <div class="col-10">
                                <select class="form-control" name="nomor_rt" id="nomor_rt_edit">
                                    <option value="">-- Pilih Nomor RT --</option>
                                    <option value="1">RT 01</option>
                                    <option value="2">RT 02</option>
                                    <option value="3">RT 03</option>
                                    <option value="4">RT 04</option>
                                    <option value="5">RT 05</option>
                                </select>
                                @error('nomor_rt')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Nomor RW: </label>
                            <div class="col-10">
                                <input type="hidden" name="nomor_rw" value="5">
                                <input type="text" class="form-control" id="nomor_rw_edit" name=""
                                    value="5" disabled>
                                @error('nomor_rw')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" value="4" name="role_id">
                        <div class="row mb-2">
                            <label class="col-2 control-label col-form-label">Upload Foto: </label>
                            <div class="col-10 mt-1">
                                <input type="file" class="form-control" id="upload_foto" name="foto_user"
                                    accept="image/*">
                                @error('upload_foto')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick=hideEditWarga()>Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal_delete_warga" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Warga</h5>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda yakin ingin menghapus data user ini?</h4>
                </div>
                <div class="modal-footer">
                    <a href="" class="hapus_warga_id btn btn-secondary">Hapus</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                        onclick=hideDeleteWarga()>Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal_delete_kepalaKeluarga" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Warga</h5>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda yakin ingin menghapus data kepala keluarga ini?</h4>
                    <small>*Jika Anda menghapus data ini, semua data yang berkaitan dengan <br>kartu keluarga data ini akan terhapus</small>
                </div>
                <div class="modal-footer">
                    <a href="" class="hapus_warga_id btn btn-secondary">Hapus</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                        onclick=hideDeleteKepalaKeluarga()>Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#submenu-kelola-data').addClass('show');
        $('#menu-kelola-warga').removeClass('text-dark').addClass('text-primary');

        function showTambahWarga() {
            $('.modal_tambah_warga').modal('show');
        }

        function hideTambahWarga() {
            $('.modal_tambah_warga').modal('hide');
        }

        function showEditWarga(idWarga) {
            $.ajax({
                url: '/admin/kelola-warga/edit/' + idWarga,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#kartu_keluarga_id_edit').val(data.kartu_keluarga.kartu_keluarga_id);
                    $('#nama_user_edit').val(data.nama_user);
                    $('#nama_user_lama').val(data.nama_user);
                    $('#nama_kepala_keluarga').val(data.kartu_keluarga.nama_kepala_keluarga);
                    $('#email_user_edit').val(data.email_user);
                    $('#nik_user_edit').val(data.nik_user);
                    $('#tempat_edit').val(data.tempat);
                    $('#nomor_rt_edit').val(data.nomor_rt);
                    $('#tanggal_lahir_edit').val(data.tanggal_lahir);
                    $('#gender_edit').val(data.gender);
                    $('#agama_edit').val(data.agama);
                    $('#status_kawin_edit').val(data.status_kawin);
                    $('#pekerjaan_user_edit').val(data.pekerjaan_user);
                    $('#gaji_user_edit').val(data.gaji_user);
                    $('#alamat_user_edit').val(data.alamat_user);
                }
            });

            $('#editWarga').attr('action', '/admin/kelola-warga/update/' + idWarga);

            $('.modal_edit_warga').modal('show');
        }

        function hideEditWarga() {
            $('.modal_edit_warga').modal('hide');
        }

        function showDeleteWarga(idWarga) {
            $.ajax({
                url: '/admin/kelola-warga/check/' + idWarga,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data == true) {
                        $('.hapus_warga_id').attr('href', '/admin/kelola-warga/delete/' + idWarga)
                        $('.modal_delete_kepalaKeluarga').modal('show')
                    } else {
                        $('.hapus_warga_id').attr('href', '/admin/kelola-warga/delete/' + idWarga)
                        $('.modal_delete_warga').modal('show')
                    }
                }
            })
        }

        function hideDeleteWarga() {
            $('.modal_delete_warga').modal('hide')
        }

        function hideDeleteKepalaKeluarga() {
            $('.modal_delete_kepalaKeluarga').modal('hide')
        }
    </script>
    <script>
        new DataTable('#table-warga');
    </script>
@endsection
