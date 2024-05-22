@extends('template.admin.main')
@section('content')
@include('template.admin.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="card-body">
                <h4>Kelola Surat</h4>
                <table class="table" id="table-rw">
                    <thead>
                        <th>No</th>
                        <th>Nama Pengaju</th>
                        <th>Tipe Surat</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Keterangan Surat</th>
                        <th>Aksi</th>
                        <th>Download</th>
                    </thead>
                    <tbody>
                        @foreach ($dataSurat as $s)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->user->nama_user }}</td>
                                <td>{{ $s->jenis_surat }}</td>
                                <td>{{ $s->detail->tanggal_surat }}</td>
                                <td>{{ $s->detail->keterangan_surat }}</td>
                                <td>
                                    <div style="display: flex;">
                                        <button href="#" class="btn btn-success"
                                        style="margin-right: 5px;">Setuju</button>
                                        <button href="#" class="btn btn-danger">Tolak</button>
                                    </div>
                                </td>
                                <td>
                                    <button href='#' class='btn btn-primary'>Download</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <script>
        new DataTable('#table-rw');
    </script>
    </div>
@endsection
