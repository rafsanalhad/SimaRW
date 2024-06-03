@extends('template.rt.main')
@section('content')
    @include('template.rt.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div class="container d-flex justify-content-end align-items-center" style="position: relative;">
                <div style="position: absolute; top: 30px; right: 25px;" class="d-flex align-items-center">
                    <a href="/rt/download-iuran">
                        <img style="height: 30px; width: 30px; margin-right: 10px;" src="../assets/images/logos/excel.png"
                            alt="gambar convert excel">
                    </a>
                    <span class="badge bg-light text-dark"><strong>Total Iuran:</strong> Rp. {{ $totalSaldo->sisa_saldo }}</span>
                </div>
            </div>
            <div class="card-body">
                <h4 class="mb-4">Laporan Iuran</h4>
                <hr>
                <table class="table" id="table-iuran">
                    <thead>
                        <th>Nama</th>
                        <th>Tanggal Bayar</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($dataIuran as $i)
                            <tr>
                                <td>{{ $i->kartuKeluarga->nama_kepala_keluarga }}</td>
                                <td>{{ $i->tanggal_iuran }}</td>
                                <td>Rp. 30.000</td>
                                <td>
                                    @if ($i->status == 'Lunas')
                                        <span class="badge bg-success">Lunas</span>
                                    @else
                                        <span class="badge bg-warning">Belum Lunas</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $('#submenu-kelola-iuran').addClass('show');
        $('#menu-laporan-iuran').removeClass('text-dark').addClass('text-primary');
        new DataTable('#table-iuran');
    </script>
@endsection
