@extends('template.warga.main')
@section('content')
    @include('template.warga.header')

    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>

            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" width="35"
                                height="35" class="rounded-circle">
                        </a>
                        <div class="dropdown dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop2">
                            <div class="message-body">
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-mail fs-6"></i>
                                    <p class="mb-0 fs-3">My Account</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-list-check fs-6"></i>
                                    <p class="mb-0 fs-3">My Task</p>
                                </a>
                                <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
        </nav>
    </header>
    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <h4>Kegiatan Warga</h4>

        <div class="row">
            {{-- @foreach ($umkm as $umkm) --}}
            @foreach ($kegiatan as $kegiatan)
                <div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="card" style="width: 18rem;">
                                @if ($kegiatan->foto_kegiatan != null)
                                    <img class="card-img-top" src="{{ asset('storage/' . $kegiatan->foto_kegiatan) }}"
                                        alt="Card image cap">
                                @else
                                    <img class="card-img-top"
                                        src="{{ asset('storage/Umkm-images/' . '3JlJ3qI1COmbaCtdXTbTht5mWqSIUyYYEWSSl3wD.png') }}"
                                        alt="Card image cap">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $kegiatan->nama_kegiatan }}</h5>
                                    <p class="card-text">{{ $kegiatan->tempat_kegiatan }}</p>
                                    <p class="card-text">{{ $kegiatan->deskripsi_kegiatan }}</p>
                                    <p class="card-text">Hari/Tanggal : {{ $kegiatan->hari_kegiatan }}/{{ $kegiatan->jadwal_kegiatan }}</p>
                                    <p>Jam {{ $kegiatan->jam_awal }} - {{ $kegiatan->jam_akhir }}</p>
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
