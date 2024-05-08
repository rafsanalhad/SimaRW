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
                        <th>Nama Warga</th>
                        <th>Alamat Warga</th>
                        <th>Pekerjaan Warga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                Rizky Arifiansyah
                            </td>
                            <td>Malang</td>
                            <td>Pengusaha</td>
                            <td><a href="" class="btn btn-danger">Ditolak</a></td>
                            <td><a href="#" onclick='showTambahBansos()' class="btn btn-dark">Verifikasi</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                Rizky Arifiansyah
                            </td>
                            <td>Malang</td>
                            <td>Pengusaha</td>
                            <td><a href="" class="btn btn-info">Menunggu</a></td>
                            <td><a href="#" onclick='showTambahBansos()' class="btn btn-success">Verifikasi</a></td>
                        </tr>
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
                                <div class="col-5" >
                                    <div style="background-color: red; margin-left: 10px; height:500px;"></div>
                                </div>
                                <div class="col-7">
                                    <h4>Silahkan Melakukan Verifikasi Bansos</h4>
                                    <button href="#" class="btn btn-success"
                                        style="margin-right: 5px;">Setuju</button>
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
