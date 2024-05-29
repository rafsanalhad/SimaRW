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
                    <div class="card shadow-lg" onclick="showModalUmkm()">
                        <div class="card-body">
                            <div class="card" style="width: 18rem; height: 540px;">
                                <img class="card-img-top" src="{{ $umkm->gambar_umkm }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                                    <p class="card-text ">{{ $umkm->deskripsi_umkm }}</p>
                                    <p class="card-text">Pemilik: {{ $umkm->user->nama_user }}</p>
                                    <p class="card-text">Jam Buka: {{ $umkm->jam_operasional_awal }} -
                                        {{ $umkm->jam_operasional_akhir }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- @endforeach --}}
        </div>
    </div>
    <div class="modal modal_umkm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('assets/images/content/img_hero.png') }}" alt="" class="img_umkm">
                    <h3>Toko Kelontong Pak Alhad</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut fringilla magna, non molestie
                        enim.
                        Donec convallis sagittis lacinia. Morbi eu semper erat, eget tempor libero. Sed ac risus vitae nulla
                        semper
                        imperdiet et non sem. Sed convallis viverra elit in varius. Integer non nisi ac eros ullamcorper
                        finibus at
                        pulvinar ex. Proin euismod tincidunt molestie. Fusce vestibulum elit aliquet placerat condimentum.
                        Curabitur
                        in libero nisi. Maecenas accumsan nec ipsum at vestibulum.</p>
                    <div class="row">
                        <div class="col-6">
                            <h3 class="fs-4">Jam Operasi:</h3>
                            <p>Setiap Hari jam 08.00 - 19.00</p>
                        </div>
                        <div class="col-6">
                            <h3 class="fs-4">Kontak:</h3>
                            <p>085763357188275</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick=hideModalUmkm()>Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
            function showModalUmkm() {
            $('.modal_umkm').modal('show');
        }
        function hideModalUmkm() {
            $('.modal_umkm').modal('hide');
        }
    </script>
@endsection
