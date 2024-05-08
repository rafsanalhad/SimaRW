@extends('template.warga.main')
@section('content')
@include('template.warga.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                <button class="btn btn-sm btn-primary float-end" id="tambah-data-warga" onclick="showTambahWarga()">
                    <i class="bi bi-plus-lg"></i> Ajukan Surat
                </button>
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
                            {{-- @foreach ($dataWarga as $warga) --}}
                                <tr>
                                    {{-- <td>{{ $no++ }}</td> --}}
                                    <td>1</td>
                                    {{-- <td>{{ $warga->nama_user }}</td> --}}
                                    <td>Rizky Arifiansyah</td>
                                    <td>22417200059</td>
                                    {{-- <td>{{ $warga->nik_user }}</td> --}}
                                    <td>20 Juni 2024</td>
                                    <td>Surat SKTM</td>
                                    <td><button class="btn btn-primary">Download</button></td>
                                    <td><button class="btn btn-success">Diterima</button></td>
                                </tr>
                                <tr>
                                    {{-- <td>{{ $no++ }}</td> --}}
                                    <td>2</td>
                                    {{-- <td>{{ $warga->nama_user }}</td> --}}
                                    <td>Rizky Arifiansyah</td>
                                    <td>22417200059</td>
                                    {{-- <td>{{ $warga->nik_user }}</td> --}}
                                    <td>20 Juni 2024</td>
                                    <td>Surat SKTM</td>
                                    <td> <button class="btn btn-danger">Belum Disetujui</button></td>
                                    <td> <button class="btn btn-danger">Ditolak</button></td>
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
