@extends('template.admin.main')
@section('content')
@include('template.admin.header')

<div class="container-fluid">
    <h1 style="font-size: 30px; font-weight: bold;">Form Lapor Keuangan</h1>
    <div class="card shadow-lg">
        <h5 class="mt-3 ms-3">Isi Data Pengeluaran</h5>
        <div class="card-body">
            <form action="/warga/edit-profil" method="POST" class="form-horizontal row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="nama_awal" class="col-form-label">Nama Pelapor:</label>
                        <div class="col-sm-12">
                            <input placeholder="Masukkan Nama Lengkap Anda" type="text" class="form-control"
                                id="nama_awal" name="nama_awal" value="{{ old('nama_awal') }}" required>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="jabatan" class="col-form-label">Jabatan:</label>
                        <div class="col-sm-12">
                            <select name="pilih_jabatan" id="pilih_jabatan" class="form-control" required>
                                <option name="pilih_jabatan" value="">-- Pilih Jabatan Anda --</option>
                                <option name="pilih_jabatan" value="rt">RT</option>
                                <option name="pilih_jabatan" value="rw">RW</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="nomor_rt" class="col-form-label">RT:</label>
                        <div class="col-sm-12">
                            <input placeholder="Masukkan Nomor RT" type="text" class="form-control" id="nama_awal"
                                name="nomor_rt" value="{{ old('nomor_rt') }}" required>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="nomor_rw" class="col-form-label">RW:</label>
                        <div class="col-sm-12">
                            <input placeholder="Masukkan Nomor RW" type="nomor_rw" class="form-control" id="nomor_rw"
                                name="nomor_rw" value="{{ old('nomor_rw') }}" required>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="jumlah_pengeluaran" class="col-form-label">Jumlah Pengeluaran:</label>
                        <div class="col-sm-12">
                            <input placeholder="Masukkan Jumlah Pengeluaran" type="jumlah_pengeluaran"
                                class="form-control" id="jumlah_pengeluaran" name="jumlah_pengeluaran"
                                value="{{ old('jumlah_pengeluaran') }}" required>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="bukti_struk" class="col-form-label">Upload Bukti Struk:</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control-file" id="bukti_struk" name="bukti_struk"
                                accept="image/*" required>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="pengaduan_warga" class="col-form-label">Detail Pengeluaran:</label>
                        <div class="col-sm-12">
                            <textarea placeholder="Masukkan detail pengeluaran" type="pengaduan_warga"
                                class="form-control" id="pengaduan_warga" name="pengaduan_warga"
                                value="{{ old('pengaduan_warga') }}" rows="7px" required></textarea>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>

            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $('#submenu-kelola-iuran').addClass('show');
    $('#menu-kelola-iuran').removeClass('text-dark').addClass('text-primary');
</script>
@endsection
