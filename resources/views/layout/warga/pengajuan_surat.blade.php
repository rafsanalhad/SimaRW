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
                            @if ($surat != null)
                                @foreach ($surat as $s)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $s->user->nama_user }}</td>
                                        <td>{{ $s->user->nik_user }}</td>
                                        <td>{{ $s->detail->tanggal_surat }}</td>
                                        <td>{{ $s->jenis_surat }}</td>
                                        @if ($s->status_surat == 'Diterima')
                                            <td><button class="btn btn-primary">Download</button></td>
                                            <td><button class="btn btn-success">Diterima</button></td>
                                        @else
                                            <td> <button class="btn btn-danger">Belum Disetujui</button></td>
                                            <td> <button class="btn btn-danger">Ditolak</button></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                {{-- no data --}}
                            @endif
                            
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
