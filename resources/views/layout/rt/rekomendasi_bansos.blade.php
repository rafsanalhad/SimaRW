@extends('template.rt.main')
@section('content')
    @include('template.rt.header')
    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div style="position: absolute; top: 30px; right: 25px;" class="d-flex align-items-center">
                <a href="/rt/rekomendasi-bansos/download-saw">
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
                            <th>Total Pendapatan Keluarga</th>
                            <th>Jumlah Anggota Keluarga</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                            @foreach ($bansosRekom as $bansos)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $bansos->kartuKeluarga->nama_kepala_keluarga }}</td>
                                    <td>{{ $bansos->kartuKeluarga->no_kartu_keluarga }}</td>
                                    <td>Rp. {{ $bansos->total_gaji }}</td>
                                    <td>{{ $bansos->user_count }} Orang</td>
                                    <td>{{ $bansos->kartuKeluarga->jumlah_tanggungan }}</td>
                                    <td>
                                        @if ($bansos->status == 'Layak')
                                            <div class="btn btn-success">Layak Menerima Bansos</div>
                                        @else
                                            <div class="btn btn-danger">Tidak Layak Menerima Bansos</div>
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
        $('#menu-penerima-bansos').removeClass('text-dark').addClass('text-primary');
        new DataTable('#table-bansos');
    </script>
@endsection
