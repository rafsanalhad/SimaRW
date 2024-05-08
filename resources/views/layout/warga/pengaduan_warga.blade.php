@extends('template.warga.main')
@section('content')
@include('template.warga.header')

    <div class="container-fluid">
        <h1 style="font-size: 30px; font-weight: bold;">Form Pengaduan</h1>
        <div class="card shadow-lg">
            <h5 class="mt-3 ms-3">Isi Data Pengaduan</h5>
            <div class="card-body">
                <form action="/warga/edit-profil" method="POST" class="form-horizontal row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nama_awal" class="col-form-label">Nama Lengkap:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Nama Lengkap Anda" type="text" class="form-control"
                                    id="nama_awal" name="nama_awal" value="{{ old('nama_awal') }}" required>
                                <small class="form-text text-danger"></small>
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
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="alamat_rumah_warga" class="col-form-label">Alamat Rumah:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Alamat Lengkap Anda" type="alamat_rumah_warga"
                                    class="form-control" id="alamat_rumah_warga" name="alamat_rumah_warga"
                                    value="{{ old('alamat_rumah_warga') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="pengaduan_warga" class="col-form-label">Isi Pengaduan:</label>
                            <div class="col-sm-12">
                                <textarea placeholder="Masukkan detail pengaduan anda" type="pengaduan_warga" class="form-control"
                                    id="pengaduan_warga" name="pengaduan_warga" value="{{ old('pengaduan_warga') }}" rows="7px" required></textarea>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mt-3">Ajukan Pengaduan</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection