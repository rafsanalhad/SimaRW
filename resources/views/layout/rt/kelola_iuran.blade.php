@extends('template.rt.main')
@section('content')
@include('template.rt.header')

<div class="container-fluid">
    <h1 style="font-size: 30px; font-weight: bold;">Form Lapor Keuangan</h1>
    <div class="card shadow-lg">
        <h5 class="mt-3 ms-3">Isi Data Pengeluaran</h5>
        <div class="card-body">
            <form action="/rt/kelola-iuran" method="POST" class="form-horizontal row" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="nama_awal" class="col-form-label">Nama Pelapor:</label>
                        <div class="col-sm-12">
                            <input placeholder="Masukkan Nama Lengkap Anda" type="text" class="form-control"
                                id="nama_awal" name="nama_pelapor" value="{{ old('nama_awal') }}" required>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="jabatan" class="col-form-label">Jabatan:</label>
                        <div class="col-sm-12">
                            <select name="jabatan_pelapor" id="pilih_jabatan" class="form-control" required>
                                <option value="">-- Pilih Jabatan Anda --</option>
                                <option value="rt">RT</option>
                                <option value="rw">RW</option>
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
                            <input placeholder="Masukkan Nomor RW" type="text" class="form-control" id="nomor_rw"
                                name="nomor_rw" value="{{ old('nomor_rw') }}" required>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="jumlah_pengeluaran" class="col-form-label">Jumlah Pengeluaran:</label>
                        <div class="col-sm-12">
                            <input placeholder="Masukkan Jumlah Pengeluaran" type="text"
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
                            <input type="file" class="form-control" id="bukti_struk" name="bukti_struk"
                                accept="image/*" required>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label for="pengaduan_warga" class="col-form-label">Keterangan Pengeluaran:</label>
                        <div class="col-sm-12">
                            <textarea placeholder="Masukkan detail pengeluaran"
                                class="form-control" id="pengaduan_warga" name="keterangan_pengeluaran"
                                value="{{ old('detail_pengeluaran') }}" rows="7px" required></textarea>
                            <small class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mt-3 me-2">Simpan Laporan Pengeluaran</button>
                </div>
            </form>
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
