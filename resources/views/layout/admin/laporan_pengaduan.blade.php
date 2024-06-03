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
                        <th>Bukti Pengaduan</th>
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
                                <td><img width="200px" src="{{ asset('storage/' . $laporan->gambar_pengaduan) }}" alt="Gambar Bukti Pengaduan"></td>
                                <td class="d-flex gap-2">
                                    <a href="#" onclick="showTolak({{ $laporan->pengaduan_id }})" class="btn btn-danger">Tolak</a>
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
                    <form action="" id="alasanPenolakanPengaduan" method="POST" class="form-horizontal">
                        @csrf
                        <div class="row mb-2">
                            <label class="col-12 control-label col-form-label">Masukan Alasan Penolakan : </label>
                            <div class="col-12">
                                <textarea class="form-control" name="alasan_penolakan" id="alasan_penolakan" cols="100" rows="10"></textarea>
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

        function showTolak(idPengaduan) {
            $('#alasanPenolakanPengaduan').attr('action', '/admin/tolak-pengaduan/' + idPengaduan);

            $('.modal_tolak').modal('show');
        }

        function hideTolak() {
            $('.modal_tolak').modal('hide');
        }
    </script>
@endsection

