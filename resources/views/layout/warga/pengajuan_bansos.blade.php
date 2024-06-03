@extends('template.warga.main')
@section('content')
    @include('template.warga.header')

    <div class="container-fluid">
        <h1 style="font-size: 30px; font-weight: bold;">Form Pengajuan Bansos</h1>
        <div class="card shadow-lg">
            <h5 class="mt-3 ms-3">Isi Data Pengajuan Bansos</h5>
            <div class="card-body">
                <form action="/warga/pengajuan-bansos" method="POST" class="form-horizontal row" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nama_kepala_keluarga" class="col-form-label">Nama Kepala Keluarga:</label>
                            <div class="col-sm-12">
                                <input type="hidden" name="kartu_keluarga_id" value="{{ $kepalaKeluarga->kartu_keluarga_id }}">
                                <input type="text" class="form-control" value="{{ $kepalaKeluarga->no_kartu_keluarga }} - {{ $kepalaKeluarga->nama_kepala_keluarga }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="gaji_warga" class="col-form-label">Pendapatan Satu Keluarga (Bulan):</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="pendapatan_keluarga" id="">
                                    <option value="">-- Masukkan Rentang Pendapatan Keluarga --</option>
                                    <option value="Rp. 500.000 - Rp. 1.000.000">Rp. 500.000 - Rp. 1.000.000</option>
                                    <option value="Rp. 1.000.000 - Rp. 3.000.000">Rp. 1.000.000 - Rp. 3.000.000</option>
                                    <option value="Rp. 3.000.000 - Rp. 5.000.000">Rp. 3.000.000 - Rp. 5.000.000</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="tanggungan_warga" class="col-form-label">Jumlah Tanggungan:</label>
                            <div class="col-sm-12">
                                <input placeholder="Contoh: (1 istri,1 anak)" type="text" class="form-control"
                                    id="tanggungan_warga" name="tanggungan_warga" value="{{ old('tanggungan_warga') }}"
                                    required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nomor_rt" class="col-form-label">RT:</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="nomor_rt" id="">
                                    <option value="">-- Masukkan RT --</option>
                                    <option value="1">RT 1</option>
                                    <option value="2">RT 2</option>
                                    <option value="3">RT 3</option>
                                    <option value="4">RT 4</option>
                                    <option value="5">RT 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="nomor_rw" class="col-form-label">RW:</label>
                            <div class="col-sm-12">
                                <input placeholder="Masukkan Nomor RW" type="text" class="form-control" id="nomor_rw"
                                    name="nomor_rw" value="{{ old('nomor_rw') }}" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="upload_sktm" class="col-form-label">Upload SKTM (Max Ukuran File 2MB):</label>
                            <div class="col-12">
                                <input type="file" class="form-control" id="file_sktm" name="file_sktm"
                                    accept="application/pdf" required>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="upload_sktm" class="col-form-label">Alamat Rumah (Berdasarkan KK):</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="alamat_rumah_warga"
                                    value="{{ $kepalaKeluarga->alamat_kk }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="alasan_warga" class="col-form-label">Alasan Membutuhkan Bansos:</label>
                            <div class="col-sm-12">
                                <textarea placeholder="Masukkan detail alasan anda membutuhkan bansos" class="form-control" id="alasan_warga"
                                    name="alasan_warga" value="{{ old('alasan_warga') }}" rows="7px" required></textarea>
                                <small class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-3" id="btnAjukanBansos">Ajukan Bansos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
          $('#submenu-kelola-bansos').addClass('show');
        $('#menu-pengajuan-bansos').removeClass('text-dark').addClass('text-primary');
        document.getElementById("btnAjukanBansos").addEventListener("click", function() {
            Swal.fire({
                title: "Berhasil!",
                text: "Anda Telah Berhasil Mengajukan Bansos",
                icon: "success"
            });
        });
    </script>
@endsection
