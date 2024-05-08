@extends('template.admin.main')
@section('content')
@include('template.admin.header')

    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-body">
                <h4>Laporan Pengaduan</h4>
                <table class="table" id='table_pengaduan'>
                    <thead>
                        <th>No</th>
                        <th>Nama Warga</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Alamat</th>
                        <th>Isi Pengaduan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $laporan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $laporan->user->nama_user }}
                                </td>
                                <td>{{ $laporan->tanggal_pengaduan }}</td>
                                <td>{{ $laporan->user->alamat_user }}</td>
                                <td>{{ $laporan->isi_pengaduan }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('tolakPengaduan', $laporan->pengaduan_id) }}" class="btn btn-danger">Tolak</a>
                                    <a href="{{ route('terimaPengaduan', $laporan->pengaduan_id) }}" class="btn btn-success">Terima</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        new DataTable('#table_pengaduan');
    </script>
    <script>
        $('#submenu-laporan-pengaduan').addClass('show');
        $('#menu-laporan-pengaduan').removeClass('text-dark').addClass('text-primary');
    </script>
@endsection

