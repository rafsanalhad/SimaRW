@extends('template.admin.main')
@section('content')
@include('template.admin.header')

    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-body">
                <h4>Laporan Pengaduan</h4>
                <table class="table" id='table_pengaduan'>
                    <thead>
                        <th>No</th>
                        <th>Nama Warga</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Isi Pengaduan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $laporan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $laporan->user->nama_user }}
                                </td>
                                <td>{{ $laporan->tanggal_pengaduan }}</td>
                                <td>{{ $laporan->user->alamat_user }}</td>
                                <td>{{ $laporan->nomor_rt }}</td>
                                <td>{{ $laporan->nomor_rw }}</td>
                                <td>{{ $laporan->isi_pengaduan }}</td>
                                <td class="d-flex gap-2">
                                    <a href="#" onclick="showTolak()" class="btn btn-danger">Tolak</a>
                                    <a href="{{ route('terimaPengaduan', $laporan->pengaduan_id) }}" class="btn btn-success">Terima</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                    <form action="{{ route('tolakPengaduan', $laporan->pengaduan_id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">

                        <div class="row mb-2">
                            <label class="col-12 control-label col-form-label">Masukan Alasan Penolakan : </label>
                            <div class="col-10">
                                <textarea name="alasan_penolakan" id="alasan_penolakan" cols="100" rows="10"></textarea>
                                @error('nama_user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Tolak</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick=hideTolak()>Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        new DataTable('#table_pengaduan');
    </script>
    <script>
        $('#submenu-laporan-pengaduan').addClass('show');
        $('#menu-laporan-pengaduan').removeClass('text-dark').addClass('text-primary');

        function showTolak() {
            $('.modal_tolak').modal('show');
        }

        function hideTolak() {
            $('.modal_tolak').modal('hide');
        }
    </script>
@endsection

