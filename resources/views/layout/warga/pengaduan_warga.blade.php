@extends('template.warga.main')
@section('content')
    @include('template.warga.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                <button class="btn btn-sm btn-primary float-end" id="tambah-pengaduan" onclick="showTambahPengaduan()">
                    <i class="bi bi-plus-lg"></i> Tambah
                </button>
                <h4 class="mb-4">History Pengaduan</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="table-pengaduan">
                        <thead>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Pengaduan</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $pengaduan)
                                <tr>
                                    <td>{{ $pengaduan->user->nama_user }}</td>
                                    <td>{{ $pengaduan->user->kartuKeluarga->alamat_kk }}</td>
                                    <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                    <td>{{ $pengaduan->isi_pengaduan }}</td>
                                    <td>
                                        @if ($pengaduan->status_pengaduan == 'Diproses')
                                            <a href="#" class="btn btn-primary">Diproses</a>
                                        @elseif ($pengaduan->status_pengaduan == 'Selesai')
                                            <a href="#" class="btn btn-success">Diterima</a>
                                        @else
                                            <a href="#" onclick="showTolak('{{ $pengaduan->alasan_tolak }}')" class="btn btn-danger">Ditolak</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal modal_tambah_pengaduan" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengaduan</h5>
                </div>
                <div class="modal-body">
                    <form action="/warga/tambah-pengaduan" method="POST" class="form-horizontal row"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="nama_awal" class="col-form-label">Nama Lengkap:</label>
                                <div class="col-sm-12">
                                    <input placeholder="Masukkan Nama Lengkap Anda" type="text" class="form-control"
                                        id="nama_awal" name="nama_awal" value="{{ Auth::user()->nama_user }}" disabled>
                                    <small class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="nomor_rt" class="col-form-label">RT:</label>
                                <div class="col-sm-12">
                                    <input placeholder="Masukkan Nomor RT" type="text" class="form-control"
                                        id="nama_awal" name="nomor_rt" value="{{ old('nomor_rt') }}" required>
                                    <small class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="nomor_rw" class="col-form-label">RW:</label>
                                <div class="col-sm-12">
                                    <input placeholder="Masukkan Nomor RW" type="nomor_rw" class="form-control"
                                        id="nomor_rw" name="nomor_rw" value="{{ old('nomor_rw') }}" required>
                                    <small class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="alamat_rumah_warga" class="col-form-label">Alamat Rumah:</label>
                                <div class="col-sm-12">
                                    <input placeholder="Masukkan Alamat Lengkap Anda" type="alamat_rumah_warga"
                                        class="form-control" id="alamat_rumah_warga" name="alamat_rumah_warga"
                                        value="{{ Auth::user()->alamat_user }}" disabled>
                                    <small class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="bukti_pengaduan" class="col-form-label">Bukti Pengaduan:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="bukti_pengaduan" id="bukti_pengaduan" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label for="pengaduan_warga" class="col-form-label">Isi Pengaduan:</label>
                                <div class="col-sm-12">
                                    <textarea placeholder="Masukkan detail pengaduan anda" type="pengaduan_warga" class="form-control" id="pengaduan_warga"
                                        name="isi_pengaduan" value="{{ old('isi_pengaduan') }}" rows="7px" required></textarea>
                                    <small class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-dismiss="modal">Ajukan
                                Pengaduan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                onclick=hideTambahPengaduan()>Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal_tolak" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alasan penolakan</h5>
                </div>
                <div class="modal-body">
                    <div class="row mb-5" id="alasan_tolak_content">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick=hideTolak()>Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        new DataTable('#table-pengaduan');
    </script>
    <script>
        function showTambahPengaduan() {
            $('.modal_tambah_pengaduan').modal('show');
        }

        function hideTambahPengaduan() {
            $('.modal_tambah_pengaduan').modal('hide');
        }

        function showTolak(alasanTolak) {
            $('#alasan_tolak_content').text(alasanTolak);
            $('.modal_tolak').modal('show');
        }

        function hideTolak() {
            $('.modal_tolak').modal('hide');
        }
    </script>
@endsection
