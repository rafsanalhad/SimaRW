@extends('template.admin.main')
@section('content')
@include('template.admin.header')

<div class="container-fluid">
    {{-- <h3>Data Warga</h3> --}}
    <div class="card shadow-lg">
        <div class="card-body">
            <h4 class="mb-4">Laporan Iuran</h4>
            <hr>
            <table class="table" id="table-warga">
                <thead>
                    <th>Nama</th>
                    <th>Nominal</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Rizky Arifiansyah</td>
                        <td>Rp. 30.000</td>
                        <td>
                            <span class="badge bg-success">Lunas</span>
                            <span class="badge bg-warning">Belum Lunas</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $('#submenu-kelola-iuran').addClass('show');
    $('#menu-laporan-iuran').removeClass('text-dark').addClass('text-primary');
</script>
@endsection
