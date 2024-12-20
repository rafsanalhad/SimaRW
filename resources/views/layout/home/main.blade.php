<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMA</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/newlogoSima.png" />
    <link rel="stylesheet" href="{{ @asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ @asset('assets/css/home.css') }}">
    <style>
        .owl-prev {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 40%;
            margin-left: -20px;
            display: block !important;
            border: 0px solid black;
        }

        .owl-next {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 40%;
            right: -25px;
            display: block !important;
            border: 0px solid black;
        }

        .owl-prev i,
        .owl-next i {
            transform: scale(1, 6);
            color: #ccc;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css    ">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light shadow-lg fixed-top z-100"
            style="background: linear-gradient(to left, var(--background-color), #cadeff);">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ @asset('assets/images/logos/logo.png') }}" alt=""></a>
                <button class="navbar-toggler button_nav_mobile" type="button">
                    <span class="navbar_overlay_icon bi"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#fitur">Fitur Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#umkm">Umkm Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kegiatan_warga">Kegiatan Warga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Kontak</a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> --}}
                    </ul>
                    <form class="d-flex">
                        <a href="/login" class="btn btn-primary me-2">Login</a>
                    </form>
                </div>
            </div>
        </nav>
        <div class="navbar_overlay">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link nav_link_overlay">Home</a></li>
                <li class="nav-item"><a class="nav-link nav_link_overlay">Fitur Kami</a></li>
                <li class="nav-item"><a class="nav-link nav_link_overlay">Umkm Kami</a></li>
                <li class="nav-item"><a class="nav-link nav_link_overlay">Kegiatan Warga</a></li>
                <li class="nav-item"><a class="nav-link nav_link_overlay">Kontak</a></li>
            </ul>
        </div>
        <section class="hero" id="home">
            <div class="container-fluid" data-aos="fade-down">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="">
                            <span class="notif_hero">Baru: Sekarang Bayar Iuran Bisa Pakai Sima</span>
                            <p class="text_hero mt-4">Selamat Datang di Sistem Informasi Manajemen Warga
                                <span class="inline typing-text text-hero"></span>
                            </p>
                            <p class="text_content_hero">Kelola dan akses
                                informasi warga di SIMA dengan mudah</p>
                            <a href="/login" class="btn btn_hero">Mulai Sekarang</a>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center mt-3">

                        <img style="width: 100%; height: 100%; border-radius: 36px;" class="img_hero"
                            src="{{ @asset('assets/images/content/fotoRTRW.jpg') }}" alt="">

                    </div>
                </div>
            </div>
        </section>
        <section class="section fitur mt-5" id="fitur">
            <div class="container-fluid">
                <div class="row">
                    <div data-aos="zoom-in" class="col-md-6 d-flex align-items-center">
                        <div class="wrapper_img_fitur">
                            <img class="img_fitur" src="{{ @asset('assets/images/products/gambar1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="zoom-in">
                        <div class="header_fitur mt-5">Nikmati Manfaat Fitur Kami Yang Sudah Terintegrasi Dengan RT dan
                            RW setempat
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="iconFitur d-flex justify-content-center align-items-center"> <i
                                        class="bi bi-person iconBootstrap"></i></div>
                                <div class="subHeaderFitur mb-2 mt-2">Tampilan Yang Mudah</div>
                                <p>Tampilan yang mudah dipahami oleh pengguna sehingga nyaman saat digunakan</p>
                            </div>
                            <div class="col-md-6">
                                <div class="iconFitur d-flex justify-content-center align-items-center"> <i
                                        class="bi bi-person iconBootstrap"></i></div>
                                <div class="subHeaderFitur mb-2 mt-2">Informasi Tekini</div>
                                <p>Dapatkan informasi terkini mengenai semua hal yang ada di lingkungan RT/RW</p>
                            </div>
                            <div class="col-md-6">
                                <div class="iconFitur d-flex justify-content-center align-items-center"> <i
                                        class="bi bi-person iconBootstrap"></i></div>
                                <div class="subHeaderFitur mb-2 mt-2">Mempermudah administrasi</div>
                                <p>Pengurusan administrasi yang mudah untuk warga</p>
                            </div>
                            <div class="col-md-6">
                                <div class="iconFitur d-flex justify-content-center align-items-center"> <i
                                        class="bi bi-person iconBootstrap"></i></div>
                                <div class="subHeaderFitur mb-2 mt-2">Pelayanan yang cepat</div>
                                <p>Pelayanan yang cepat untuk mengurus semua kebutuhan di lingkungan RT/RW</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>
    <section class="umkm mt-5 mb-5" id="umkm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="umkm_main_header mt-3 mb-5 text-center">UMKM Kami</div>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($umkm as $umkm)
                <div class="">
                    <div class="card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                        style="height: 500px; width: 100%;">
                        <img src="{{ asset('storage/' . $umkm->gambar_umkm) }}" class="card-img-top" style="height: 250px;"
                            alt="Gambar UMKM">
                        <div class="card-body">
                            <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                            <p class="">{{ $umkm->deskripsi_umkm }}</p>
                            <div class="ketUmkm">
                                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                                <p class="m-0 p-0 jamBuka">Jam Buka: {{ $umkm->jam_operasional_awal }} -
                                    {{ $umkm->jam_operasional_akhir }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
    <section class="kegiatan_warga" id="kegiatan_warga">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="kegiatan_warga_main_header mb-5 text-center">Kegiatan Warga</h1>
                </div>
            </div>
            <div class="owl-carousel">
                @foreach ($kegiatanWarga as $kegiatan)
                <div class="">
                    <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100"
                        style="height: 400px;">
                        <img src="{{ asset('storage/' . $kegiatan->foto_kegiatan) }}" class="card-img-top"
                            style="height: 200px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $kegiatan->nama_kegiatan }}</h5>
                            <p class="">{{ $kegiatan->deskripsi_kegiatan }}</p>
                            <p class="m-0 p-0">Hari : {{ $kegiatan->jadwal_kegiatan }}</p>
                            <p class="m-0 p-0">Jam Mulai s/d Jam Selesai : {{ $kegiatan->jam_awal }} s/d
                                {{ $kegiatan->jam_akhir }}</p>
                        </div>
                    </div>
                </div>
                 @endforeach

            </div>
        </div>
    </section>
    <section data-aos="zoom-in" class="contact mt-5 mb-5" id="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="kontak_header">Hubungi Kami!</h1>
                    <p class="kontak_text">Jika ada kendala masalah login atau masalah lainnya, silahkan hubungi kami
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/hubungi-kami" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nama" class="form-label m-1">Nama Anda</label>
                                    <input type="text" name="nama" id="nama" class="form-control bg-white">
                                </div>
                                {{-- <div class="form-group mb-3">
                                    <label for="email" class="form-label m-1">Email Anda</label>
                                    <input type="email" name="email" id="email" class="form-control bg-white">
                                </div> --}}
                                <div class="form-group mb-3">
                                    <label for="subjek" class="form-label m-1">Subjek Anda</label>
                                    <input type="text" name="subjek" id="subjek" class="form-control bg-white">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pesan" class="form-label m-1">Pesan Anda</label>
                                    <textarea type="text" name="pesan" id="pesan" class="form-control bg-white"
                                        style="height: 80px;"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <footer class="footer bg-white shadow-lg"
        style="background: linear-gradient(to left, var(--background-color), #cadeff);">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="footer_left">
                            <img src="{{ @asset('assets/images/logos/logo.png') }}" alt="">
                        </div>
                        <div class="footer_right">
                            @Copyright Kelompok 5 TI-2G
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <script>
        AOS.init({
            duration: 3000
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        let navbarOpen = false;
        $(".owl-carousel").owlCarousel({
            loop:false,
    margin:20,

    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
    animateOut: 'fadeOut',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }

        });
        $(document).ready(function() {

            function checkScreenWidth() {
                if ($(window).width() >= 992) {
                    $('.navbar_overlay').removeClass('active');
                    $('.navbar_overlay_icon').removeClass('bi-x');
                    $('.navbar_overlay_icon').addClass('bi-list');
                }
            }
            checkScreenWidth();
            $(window).resize(function() {
                checkScreenWidth();
            });
        });
        $('.navbar_overlay_icon').addClass('bi-list');
        $('.navbar-toggler').on('click', function() {
            if (navbarOpen) {

                $('.navbar_overlay').removeClass('active');
                $('.navbar_overlay_icon').removeClass('bi-x');
                $('.navbar_overlay_icon').addClass('bi-list');
                navbarOpen = false;
            } else {
                $('.navbar_overlay').addClass('active');
                $('.navbar_overlay_icon').removeClass('bi-x');
                $('.navbar_overlay_icon').addClass('bi-x');
                navbarOpen = true;
            }
        });
    </script>
    <script src="{{ @asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ @asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ @asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ @asset('assets/js/app.min.js') }}"></script>
    <script src="{{ @asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ @asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ @asset('assets/js/dashboard.js') }}"></script>
</body>

</html>
