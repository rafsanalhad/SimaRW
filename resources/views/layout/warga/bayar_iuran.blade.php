@extends('template.warga.main')
@section('content')
@include('template.warga.header')

<div class="container-fluid">
    {{-- <h3>Data Warga</h3> --}}
    <div class="row">
        <div class="" id="tableIuranContainer">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h4 class="mb-4">Data Iuran</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="table-warga">
                            <thead>
                                <th>No</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>NKK</th>
                                <th>Tanggal Iuran</th>
                                <th>Tanggal Dibayar</th>
                                <th>Nominal Iuran</th>
                                <th>Yang Terbayar</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($iuran as $iuran)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $iuran->kartuKeluarga->nama_kepala_keluarga }}</td>
                                    <td>{{ $iuran->kartuKeluarga->no_kartu_keluarga }}</td>
                                    <td class="tanggalIuran">{{ $iuran->tanggal_iuran }}</td>
                                    <td>{{ $iuran->tanggal_bayar }}</td>
                                    <td>Rp. 30.000</td>
                                    @if ($iuran->status == 'Lunas')
                                    <td>Rp. 3 0.000</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    <td>
                                        @if ($iuran->status == 'Lunas')
                                        <p id="status_bayar" class="btn btn-success">Lunas</p>
                                        @else
                                        <p id="status_bayar" class="btn btn-danger">Belum lunas</p>
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
        @if ($iuranBelumLunas->isNotEmpty())
        <div class="col-md-3" id="belumLunasContainer">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pemberitahuan</h4>
                </div>
                <div class="card-body">
                    <p>Anda belum membayar iuran bulan ini, segera lakukan pembayaran agar tidak terkena denda.
                    </p>
                    <button class="btn btn-primary" id="pay-button">Bayar Iuran</button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>




</div>
<script>
    const checkLunas = () => {
const tanggalIuran = document.querySelector('.tanggalIuran').innerText;

   let statusBayar = document.getElementById('status_bayar').innerText;
   console.log(tanggalIuran)
//    var tanggalSaatIni = new Date();
// var tanggalSekarang = tanggalSaatIni.toISOString().split('T')[0];
console.log(statusBayar)
// if(tanggalIuran == tanggalSekarang){
    if(statusBayar == 'Belum lunas'){
        document.getElementById('belumLunasContainer').style.display = 'block';
        document.getElementById('tableIuranContainer').classList.remove('col-md-12');
        document.getElementById('tableIuranContainer').classList.add('col-md-9');
    }else if(statusBayar == 'lunas'){
        document.getElementById('belumLunasContainer').style.display = 'none';
        document.getElementById('tableIuranContainer').classList.remove('col-md-9');
        document.getElementById('tableIuranContainer').classList.add('col-md-12');
    }

}
//    }

    checkLunas();
</script>
@if ($iuranBelumLunas->isNotEmpty())
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
                // SnapToken acquired from previous step
                snap.pay('{{ $iuranBelumLunas[0]->snap_token }}', {
                    // Optional
                    onSuccess: function(result) {
                        // /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        window.location.href = 'http://127.0.0.1:8000/warga/bayar-iuran/' +
                            '{{ $iuranBelumLunas[0]->iuran_id }}'
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
</script>
@endif
<script>
    new DataTable('#table-warga');
        

</script>
@endsection