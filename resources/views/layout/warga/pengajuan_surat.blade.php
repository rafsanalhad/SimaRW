@extends('template.warga.main')
@section('content')
@include('template.warga.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                <button class="btn btn-sm btn-primary float-end" id="tambah-data-warga" onclick="showTambahSurat()">
                    <i class="bi bi-plus-lg"></i> Ajukan Surat</button>

                <h4 class="mb-4">History Pengajuan Surat</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="table-warga">
                        <thead>
                            <th>No</th>
                            <th>Nama Warga</th>
                            <th>NIK</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tipe Surat</th>
                            <th>Download</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @if ($surat != null)
                                @foreach ($surat as $s)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $s->user->nama_user }}</td>
                                        <td>{{ $s->user->nik_user }}</td>
                                        <td>{{ $s->detail->tanggal_surat }}</td>
                                        <td>{{ $s->jenis_surat }}</td>
                                        @if ($s->status_surat == 'Diterima')
                                            <td><button class="btn btn-primary">Download</button></td>
                                            <td><button class="btn btn-success">Diterima</button></td>
                                        @else
                                            <td> <button class="btn btn-danger">Belum Disetujui</button></td>
                                            <td> <button class="btn btn-danger">Ditolak</button></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                {{-- no data --}}
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal modal_tambah_surat" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengajuan Surat</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" class="form-horizontal">
                        <div class="row mb-2">
                            <span class="col-2 control-label col-form-label">Pilih tipe Surat : </span>
                            <div class="col-12">
                                <select name="tipe_surat" id="tipe_surat" class="form-control" required>
                                    <option value="pengantar">Surat Pengantar</option>
                                    <option value="bansos">Surat Bansos</option>
                                </select>
                                @error('nomor_surat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <span class="col-5 control-label col-form-label">Alasan Mengajukan Surat</span>
                            <div class="col-12">
                                <input type="text" class="form-control" id="tipe_surat" name="tipe_surat">
                                @error('nomor_surat')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick=hideTambahSurat()>Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
        $('#submenu-kelola-data').addClass('show');
        $('#menu-kelola-surat').removeClass('text-dark').addClass('text-primary');
        $(document).ready(function() {
            $('.modal_tambah_surat').on("submit", function(e) {

                $('#modal-tittle').html() = 'edit';
            })
        });



        function showTambahSurat() {
            $('.modal_tambah_surat').modal('show');
        }

        function hideTambahSurat() {
            $('.modal_tambah_surat').modal('hide');
        }

        new DataTable('#table-warga');
    </script>
@endsection
