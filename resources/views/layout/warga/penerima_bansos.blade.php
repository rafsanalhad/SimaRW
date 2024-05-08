@extends('template.warga.main')
@section('content')
@include('template.warga.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                <h4 class="mb-4">Penerima Bansos</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="table-warga">
                        <thead>
                            <th>No</th>
                            <th>Nama Warga</th>
                            <th>NIK</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Pekerjaan</th>
                            <th>Gaji</th>
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
                                    <td>Buruh Tani</td>
                                    <td>Rp.1000.000</td>
                                    <td><button class="btn btn-success">Diterima</button>
                                    <button class="btn btn-danger">Ditolak</button></td>
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    </div>

    <script>
        new DataTable('#table-warga');
    </script>
@endsection
