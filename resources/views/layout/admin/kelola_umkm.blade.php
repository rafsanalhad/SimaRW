@extends('template.admin.main')
@section('content')
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                        <i class="ti ti-bell-ringing"></i>
                        <div class="notification bg-primary rounded-circle"></div>
                    </a>
                </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
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
                                <a href="./authentication-login.html"
                                    class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        {{-- <h3>Data Warga</h3> --}}
        <h4>Kelola UMKM</h4>
        <a href="#" class="btn btn-success mb-3" onclick="modalTambahUmkm()">Tambah Baru</a>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ @asset('assets/images/content/img_hero.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">UMKM Maju Jaya</h5>
                                <p class="card-text">Umkm yang menjual sayur dan buah buahan</p>
                                <p class="card-text">Pemilik: gaco razan kamil</p>
                                <a href="#" class="btn btn-warning" onclick="modalEditUmkm()">Edit</a>
                                <a href="#" class="btn btn-danger" onclick="hapusData()">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body">

                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ @asset('assets/images/content/img_hero.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">UMKM Maju Jaya</h5>
                                <p class="card-text">Umkm yang menjual sayur dan buah buahan</p>
                                <p class="card-text">Pemilik: gaco razan kamil</p>
                                <a href="#" class="btn btn-warning" onclick="modalEditUmkm()">Edit</a>
                                <a href="#" class="btn btn-danger" onclick="hapusData()">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body">

                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ @asset('assets/images/content/img_hero.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">UMKM Maju Jaya</h5>
                                <p class="card-text">Umkm yang menjual sayur dan buah buahan</p>
                                <p class="card-text">Pemilik: gaco razan kamil</p>
                                <a href="#" class="btn btn-warning" onclick="modalEditUmkm()">Edit</a>
                                <a href="#" class="btn btn-danger" onclick="hapusData()">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal_tambah_umkm" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Tambah UMKM</div>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="" class="form">
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Nama Umkm
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Alamat
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Kontak
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Latitude
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Longtitude
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Jam Operasional
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Gambar UMKM
                                    </div>
                                    <div class="col-6">
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center mt-3">
                                    <div class="col-4">
                                        Deskripsi UMKM
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick=hideModalTambahUmkm()>Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const modalTambahUmkm = () => {
            $('.modal-title').html('Tambah UMKM');
            $('.modal_tambah_umkm').modal('show');
        }
        const modalEditUmkm = () => {
            $('.modal-title').html('Edit UMKM');
            $('.modal_tambah_umkm').modal('show');
        }
        const hapusData = () => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        }
        const hideModalTambahUmkm = () => {
            $('.modal_tambah_umkm').modal('hide');
        }
    </script>
@endsection
