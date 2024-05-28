@extends('template.rt.main')
@section('content')
@include('template.rt.header')

    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-body">
                <h4>History Pengaduan</h4>
                <table class="table" id='table_history_pengaduan'>
                    <thead>
                        <th>No</th>
                        <th>Nama Warga</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Alamat</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $pengaduanWarga)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $pengaduanWarga->user->nama_user }}
                                </td>
                                <td>{{ $pengaduanWarga->tanggal_pengaduan }}</td>
                                <td>{{ $pengaduanWarga->user->alamat_user }}</td>
                                <td>{{ $pengaduanWarga->status_pengaduan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        new DataTable('#table_history_pengaduan');
    </script>
      <script>
        $('#submenu-laporan-pengaduan').addClass('show');
        $('#menu-history-pengaduan').removeClass('text-dark').addClass('text-primary');
    </script>
@endsection
