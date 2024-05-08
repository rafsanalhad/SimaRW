@extends('template.warga.main')
@section('content')
@include('template.warga.header')

    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <h4>List UMKM di Desa</h4>

        <div class="row">
            {{-- @foreach ($umkm as $umkm) --}}
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('storage/Umkm-images/' . '3JlJ3qI1COmbaCtdXTbTht5mWqSIUyYYEWSSl3wD.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Toko kelontong pak alhad</h5>
                                    <p class="card-text">Toko milik pak alhad yang menjual kebutuhan sembako, bahan pokok, sabun cuci, dan lain-lain.</p>
                                    <p class="card-text">Buka: Setiap Hari</p>
                                    <p>Jam Buka: 08.00 - 21.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('storage/Umkm-images/' . '3JlJ3qI1COmbaCtdXTbTht5mWqSIUyYYEWSSl3wD.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Toko kelontong pak alhad</h5>
                                    <p class="card-text">Toko milik pak alhad yang menjual kebutuhan sembako, bahan pokok, sabun cuci, dan lain-lain.</p>
                                    <p class="card-text">Buka: Setiap Hari</p>
                                    <p>Jam Buka: 08.00 - 21.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('storage/Umkm-images/' . '3JlJ3qI1COmbaCtdXTbTht5mWqSIUyYYEWSSl3wD.png') }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Toko kelontong pak alhad</h5>
                                    <p class="card-text">Toko milik pak alhad yang menjual kebutuhan sembako, bahan pokok, sabun cuci, dan lain-lain.</p>
                                    <p class="card-text">Buka: Setiap Hari</p>
                                    <p>Jam Buka: 08.00 - 21.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            {{-- @endforeach --}}
        </div>
    </div>


@endsection
