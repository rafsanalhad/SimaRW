@extends('template.admin.main')
@section('content')
    @include('template.admin.header')
    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-body">
                <h4>Kelola Bansos</h4>
                <table class="table" id='table_bansos'>
                    <thead>
                        <th>No</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Alamat KK</th>
                        <th>Tanggungan Keluarga</th>
                        <th>Pendapatan Keluarga</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Alasan Pengajuan Bansos</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($ajuanBansos as $pengajuan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $pengajuan->kartuKeluarga->nama_kepala_keluarga }}
                                </td>
                                <td>{{ $pengajuan->kartuKeluarga->alamat_kk }}</td>
                                <td>{{ $pengajuan->tanggungan_warga }}</td>
                                <td>{{ $pengajuan->pendapatan_keluarga }}</td>
                                <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                                <td>{{ $pengajuan->alasan_warga }}</td>
                                <td><a href="" class="btn btn-info">Menunggu</a></td>
                                <td><a href="#" onclick='showTambahBansos({{ $pengajuan->pengajuan_id }})'
                                        class="btn btn-success">Verifikasi</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="modal modal_bansos" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content d-flex">
                <div class="modal-header">
                    <h5 class="modal-title">Verifikasi Bansos</h5>
                    <button type="button" class="btn-close" onclick=hideTambahBansos()>

                    </button>
                </div>
                <div class="row modal-body">
                    <div class="col-5">
                        <div style="margin-left: 10px; height:500px;"
                        class="d-flex align-items-center justify-content-center">
                        <iframe id="pdfViewer" src="" height="100%" frameborder="0"></iframe>
                    </div>
                    <button id="openPDF" class="btn btn-info ms-2 mt-2" onclick="showTambahBansos()">Buka PDF</button>
                    </div>


                    <div class="col-7">
                        <h4>Silahkan Melakukan Verifikasi Bansos</h4>
                        <a href="" id="terimaPengajuan" class="btn btn-success" style="margin-right: 5px;">Setuju</a>
                        <a href="#" id="tolakPengajuan" class="btn btn-danger">Tolak</a>
                        <div id="modalPenolakan">
                            <form action="" id="alasanPenolakanPengaduan" method="POST" class="form-horizontal">
                                @csrf
                                <div class="row mb-2">
                                    <label class="col-12 control-label col-form-label">Masukan Alasan Penolakan : </label>
                                    <div class="col-12">
                                        <textarea class="form-control" name="alasan_penolakan" id="alasan_penolakan" cols="100" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="kembaliModal">Kembali</button>
                                    <button type="submit" class="btn btn-danger">Kirim</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#alasanPenolakanPengaduan').hide(); // Menggunakan .hide() untuk menyembunyikan elemen
        });

        $('#submenu-kelola-bansos').addClass('show');
        $('#menu-kelola-bansos').removeClass('text-dark').addClass('text-primary');
        function showTambahBansos(idPengajuan) {
            $('#alasanPenolakanPengaduan').hide();
            $('#terimaPengajuan').show();
            $('#tolakPengajuan').show();
            $.ajax({
                url: '/admin/get-file/' + idPengajuan,
                type: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response) {
                    var file = new Blob([response], {
                        type: 'application/pdf'
                    });
                    var fileURL = URL.createObjectURL(file);

                    document.getElementById('openPDF').addEventListener('click', function() {
                        window.open(fileURL);
                    });

                    $('#pdfViewer').attr('src', fileURL);
                }
            })

            $('.modal_bansos').modal('show');

            $('#terimaPengajuan').attr('href', '/admin/terima-bansos/' + idPengajuan);
            $('#alasanPenolakanPengaduan').attr('action', '/admin/tolak-bansos/' + idPengajuan);

            $('#tolakPengajuan').click(function(){
                $('#alasanPenolakanPengaduan').show();
                $('#terimaPengajuan').hide();
                $('#tolakPengajuan').hide();
            });

            $('#kembaliModal').click(function(){
                $('#alasanPenolakanPengaduan').hide();
                $('#terimaPengajuan').show();
                $('#tolakPengajuan').show();
            });
        }

        function hideTambahBansos() {
            $('.modal_bansos').modal('hide');
        }
    </script>


    <script>
        new DataTable('#table_bansos');
    </script>
@endsection
