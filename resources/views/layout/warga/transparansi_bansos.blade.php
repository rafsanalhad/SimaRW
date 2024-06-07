@extends('template.warga.main')
@section('content')
    @include('template.warga.header')
    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <div class="card shadow-lg">
            <div style="position: absolute; top: 30px; right: 25px;" class="d-flex align-items-center">
                <a id="downloadExcel" href="/admin/rekomendasi-bansos/download-saw">
                    <img style="height: 30px; width: 30px;" src="../assets/images/logos/excel.png" alt="gambar convert excel">
                </a>
            </div>
            <div class="card-body">
                <h4 class="mb-4">History Penerima Bansos</h4>
                <hr>
                <div class="table-responsive" id="table_saw">
                    <table class="table" id="table-bansos">
                        <thead>
                            <th>No</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>Keterangan</th>
                        </thead>
                        {{-- @foreach ($bansosSAW as $bansos) --}}
                        <tbody>
                            <td>1</td>
                            <td>Rizky Arifiansyah</td>
                            <td>
                                <div class="btn btn-success">Bansos Di Terima</div>
                                <div class="btn btn-danger">Bansos Di Tolak</div>
                            </td>
                        </tbody>
                        {{-- @endforeach --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- <script>
        $('#submenu-kelola-bansos').addClass('show');
        $('#menu-penerima-bansos').removeClass('text-dark').addClass('text-primary');
        new DataTable('#table-bansos');
        new DataTable('#table-bansos2');
        $('#table_vikor').hide();
        $(document).ready(function(){
            $('#selectSpk').on("change", function(){
                console.log($('#selectOptionSpk').val());
                if($('#selectOptionSpk').val() == 1){
                    $('#table_saw').show();
                    $('#downloadExcel').attr('href', '/admin/rekomendasi-bansos/download-saw')
                    $('#table_vikor').hide();
                }else{
                    $('#table_saw').hide();
                    $('#table_vikor').show();
                    $('#downloadExcel').attr('href', '/admin/rekomendasi-bansos/download-vikor')
                }
            })
        })
    </script> --}}
@endsection
