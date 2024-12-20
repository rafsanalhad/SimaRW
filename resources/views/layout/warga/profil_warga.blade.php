@extends('template.warga.main')
@section('content')
@include('template.warga.header')

    <div class="container-fluid">
        <h1 style="font-size: 30px; font-weight: bold;">Profil Warga</h1>
        <div class="card shadow-lg">
            <h5 class="mt-3 ms-3">Profil Detail</h5>
            <div class="card-body">
                <form action="/warga/edit-profil" method="POST" class="form-horizontal row">
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nama_awal" class="col-form-label">Nama Lengkap:</label>
                            <div class="col-sm-12">
                                <input placeholder="Rizky Arifiansyah" type="text" class="form-control" id="nama_awal"
                                    name="nama_awal" value="{{ $profil->nama_user }}" disabled>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nkk_warga" class="col-form-label">NKK:</label>
                            <div class="col-sm-12">
                                <input placeholder="3517133241560002" type="nkk_warga" class="form-control" id="nkk_warga"
                                    name="nkk_warga" value="{{ $profil->kartuKeluarga->no_kartu_keluarga }}" disabled>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nik_warga" class="col-form-label">NIK:</label>
                            <div class="col-sm-12">
                                <input placeholder="3517133241760001" type="nik_warga" class="form-control" id="nik_warga"
                                    name="nik_warga" value="{{ $profil->nik_user }}" disabled>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="email_warga" class="col-form-label">Alamat Email:</label>
                            <div class="col-sm-12">
                                <input placeholder="aryarafsan@gmail.com" type="email_warga" class="form-control"
                                    id="email_warga" name="email_warga" value="{{ $profil->email_user }}" disabled>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nomor_rt" class="col-form-label">RT:</label>
                            <div class="col-sm-12">
                                <input placeholder="003" type="text" class="form-control" id="nama_awal"
                                    name="nomor_rt" value="{{ old('nomor_rt') }}" disabled>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nomor_rw" class="col-form-label">RW:</label>
                            <div class="col-sm-12">
                                <input placeholder="005" type="nomor_rw" class="form-control" id="nomor_rw"
                                    name="nomor_rw" value="{{ old('nomor_rw') }}" disabled>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label for="alamat_rumah_warga" class="col-form-label">Alamat:</label>
                            <div class="col-sm-12">
                                <input placeholder="Jl.Mawar no.01 KedungLosari Jawa Tengah" type="alamat_rumah_warga"
                                    class="form-control" id="alamat_rumah_warga" name="alamat_rumah_warga"
                                    value="{{ $profil->alamat_user }}" disabled>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
