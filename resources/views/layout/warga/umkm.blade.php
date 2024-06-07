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
                                <img class="card-img-top" src="{{ asset('storage/' . $umkm->gambar_umkm) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                                    <p class="card-text ">{{ $umkm->deskripsi_umkm }}</p>
                                    <p class="card-text">Pemilik: {{ $umkm->user->nama_user }}</p>
                                    <p class="card-text">Jam Buka: {{ $umkm->jam_operasional_awal }} -
                                        {{ $umkm->jam_operasional_akhir }}</p>
                                    <a href="#" class="btn btn-primary"
                                        onclick="showModalUmkm({{ $umkm->umkm_id }})">Detail</a>
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
                <div class="modal-body">
                    <img id="gambar_umkm_detail" src="{{ asset('storage/' . $umkm->gambar_umkm) }}" alt=""
                        class="img_umkm">
                    <h3 id="nama_umkm_detail"></h3>
                    <p id="deskripsi_umkm_detail"></p>
                    <div class="row">
                        <div class="col-6">
                            <h3 class="fs-4">Jam Operasi:</h3>
                            <p id="jam_buka_detail"></p>
                        </div>
                        <div class="col-6">
                            <h3 class="fs-4">Kontak:</h3>
                            <p id="kontak_umkm_detail"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick=hideModalUmkm()>Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showModalUmkm(idUmkm) {
            $.ajax({
                url: '/warga/umkm/detail/' + idUmkm,
                type: 'GET',
                dataType: 'json',
                success(data) {
                    $('#nama_umkm_detail').text(data.nama_umkm);
                    $('#kontak_umkm_detail').text(data.kontak_umkm);
                    $('#jam_buka_detail').text(data.jam_operasional_awal + ' - ' + data.jam_operasional_akhir);
                    $('#deskripsi_umkm_detail').text(data.deskripsi_umkm);
                }
            })

            $('.modal_umkm').modal('show');
        }

        function hideModalUmkm() {
            $('.modal_umkm').modal('hide');
        }
    </script>
@endsection
