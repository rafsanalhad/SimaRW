@extends('template.admin.main')
@section('content')
    @include('template.admin.header')
    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
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
        new DataTable('#table-bansos');
    </script>
@endsection
