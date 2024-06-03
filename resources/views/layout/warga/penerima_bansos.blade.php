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
                            <th>Nama Kepala Keluarga</th>
                            <th>NKK</th>
                            <th>Tanggungan Keluarga</th>
                            <th>Pendapatan Keluarga</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Alasan Pengajuan Bansos</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($bansos as $bansos)
                                <tr>
                                    {{-- <td>{{ $no++ }}</td> --}}
                                    <td>{{ $no++ }}</td>
                                    {{-- <td>{{ $warga->nama_user }}</td> --}}
                                    <td>{{ $bansos->kartuKeluarga->nama_kepala_keluarga }}</td>
                                    <td>{{ $bansos->kartuKeluarga->no_kartu_keluarga }}</td>
                                    <td>{{ $bansos->tanggungan_warga }}</td>
                                    <td>{{ $bansos->pendapatan_keluarga }}</td>
                                    <td>{{ $bansos->tanggal_pengajuan }}</td>
                                    <td>{{ $bansos->alasan_warga }}</td>
                                    <td>
                                        @if ($bansos->status_verif == 'Terverifikasi')
                                            <button class="btn btn-success">Pengajuan Diterima</button>
                                        @elseif($bansos->status_verif == 'Belum Terverifikasi')
                                            <button class="btn btn-info">Menunggu Konfirmasi</button>
                                        @else
                                            <button class="btn btn-danger">Pengajuan Ditolak</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    </div>

    <script>
        $('#submenu-kelola-bansos').addClass('show');
        $('#menu-history-bansos').removeClass('text-dark').addClass('text-primary');
        new DataTable('#table-warga');
    </script>
@endsection
