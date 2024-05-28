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
                        <th>Tanggal Pengajuan</th>
                        {{-- <th>Pekerjaan Warga</th> --}}
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
                                <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                                {{-- <td>Pengusaha</td> --}}
                                <td><a href="" class="btn btn-info">Menunggu</a></td>
                                <td><a href="#" onclick='showTambahBansos()' class="btn btn-success">Verifikasi</a></td>
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
                        <div style="margin-left: 10px; height:500px; border: 2px solid #8D8D8D;"
                            class="d-flex align-items-center justify-content-center">
                            <img src="../assets/images/content/picture1.png">
                        </div>
                    </div>


                    <div class="col-7">
                        <h4>Silahkan Melakukan Verifikasi Bansos</h4>
                        <button href="#" class="btn btn-success" style="margin-right: 5px;">Setuju</button>
                        <button href="#" class="btn btn-danger">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTambahBansos() {
            $('.modal_bansos').modal('show');
        }

        function hideTambahBansos() {
            $('.modal_bansos').modal('hide');
        }
    </script>


    <script>
        new DataTable('#table_bansos');
    </script>
@endsection
