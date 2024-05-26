@extends('template.rt.main')
@section('content')
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
                            <th>Tanggal Pengajuan</th>
                            <th>Rerata Gaji Keluarga</th>
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
                                    {{-- <td>{{ $warga->nik_user }}</td> --}}
                                    <td>{{ $bansos->tanggal_pengajuan }}</td>
                                    <td>Rp. {{ $rerataGaji }}, 00 </td>
                                    <td>
                                        @if ($bansos->status_verif == 'Terverifikasi')
                                            <button class="btn btn-success">Diterima</button>
                                        @else
                                            <button class="btn btn-danger">Ditolak</button>
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
        new DataTable('#table-warga');
    </script>
@endsection
