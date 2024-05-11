@extends('template.warga.main')
@section('content')
    @include('template.warga.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <h4>List UMKM di Desa</h4>

        <div class="row">
            {{-- @foreach ($umkm as $umkm) --}}
            @foreach ($umkm as $umkm)
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top"
                                    src="{{ asset('storage/' . $umkm->gambar_umkm ) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                                    <p class="card-text">{{ $umkm->deskripsi_umkm }}</p>
                                    <p class="card-text">Buka: Setiap Hari</p>
                                    <p>Jam Buka: {{ $umkm->jam_operasional_awal }} - {{ $umkm->jam_operasional_akhir }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
