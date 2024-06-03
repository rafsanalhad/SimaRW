@extends('template.rt.main')
@section('content')
    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div style="position: absolute; top: 30px; right: 25px;" class="d-flex align-items-center">
                <a href="#">
                    <img style="height: 30px; width: 30px;" src="../assets/images/logos/excel.png" alt="gambar convert excel">
                </a>
            </div>
            <div class="card-body">
                <h4 class="mb-4">Rekomendasi Penerima Bansos</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="table-bansos">
                        <thead>
                            <th>No</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>NKK</th>
                            <th>Rerata Gaji Keluarga</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Rizky Arifiansyah</td>
                            <td>37826842897490</td>
                            <td>Rp. 5.000.000</td>
                            <td>3 orang</td>
                            <td>
                                <div class="badge bg-success">Menerima Bansos</div>
                                <div class="badge bg-danger">Tidak Menerima Bansos</div>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
             $('#submenu-kelola-bansos').addClass('show');
        $('#menu-penerima-bansos').removeClass('text-dark').addClass('text-primary');
        new DataTable('#table-bansos');
    </script>
@endsection
