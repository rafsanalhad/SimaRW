@extends('template.warga.main')
@section('content')
    @include('template.warga.header')
    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div style="position: absolute; top: 30px; right: 25px;" class="d-flex align-items-center">
            </div>
            <div class="card-body">
                <h4 class="mb-4">History Penerima Bansos</h4>
                <hr>
                <div class="table-responsive" id="table_saw">
                    <table class="table" id="table-bansos">
                        <thead>
                            <th>No</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>Keterangan Status</th>
                        </thead>
                        <tbody>
                            @foreach ($bansos as $bansos)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $bansos->kartuKeluarga->nama_kepala_keluarga }}</td>
                                    <td>
                                        @if ($bansos->status_verif == 'Terverifikasi')
                                            <div class="badge bg-success">Pengajuan Bansos Di Terima</div>
                                        @else
                                            <div class="badge bg-danger">Pengajuan Bansos Di Tolak</div>
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
        $('#menu-history-penerima-bansos').removeClass('text-dark').addClass('text-primary');
        new DataTable('#table-bansos');
    </script>
@endsection
