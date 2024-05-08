@extends('template.warga.main')
@section('content')
@include('template.warga.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="row">
            <div class="col-md-9">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="mb-4">Data Iuran</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table" id="table-warga">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Warga</th>
                                    <th>NIK</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nominal Iuran</th>
                                    <th>Yang Terbayar</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($dataWarga as $warga) --}}
                                        <tr>
                                            {{-- <td>{{ $no++ }}</td> --}}
                                            <td>No</td>
                                            {{-- <td>{{ $warga->nama_user }}</td> --}}
                                            <td>Rizky Arifiansyah</td>
                                            <td>22417200059</td>
                                            {{-- <td>{{ $warga->nik_user }}</td> --}}
                                            <td>20 Juni 2024</td>
                                            <td>Rp. 20.000</td>
                                            <td>Rp. 20.000</td>
                                            <td><button class="btn btn-success">Lunas</button>
                                            <button class="btn btn-danger">Belum lunas</button></td>
                                        </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pemberitahuan</h4>
                    </div>
                    <div class="card-body">
                        <p>Anda belum membayar iuran bulan ini, segera lakukan pembayaran agar tidak terkena denda.</p>
                        <a href="#" class="btn btn-primary">Bayar Iuran</a>
                    </div>
                </div>
            </div>
        </div>

    </div>




    </div>

    <script>
        new DataTable('#table-warga');
    </script>
@endsection
