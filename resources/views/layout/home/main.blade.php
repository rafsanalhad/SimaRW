<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMA</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/newlogoSima.png" />
    <link rel="stylesheet" href="{{ @asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ @asset('assets/css/home.css') }}">
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
                <a class="navbar-brand" href="#"><img src="{{ @asset('assets/images/logos/logo.png') }}"
                        alt=""></a>
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
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
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
                        <a class="btn btn-primary me-2">Login</a>
                        <a href="" class="btn btn-outline-primary">Register</a>
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
                    <div class="col-md-6 d-flex justify-content-center align-items-center">

                        <img class="img_hero" src="{{ @asset('assets/images/content/img_hero.png') }}" alt="">

                    </div>
                </div>
            </div>
        </section>
        <section class="section fitur mt-5" id="fitur">
            <div class="container-fluid">
                <div class="row">
                    <div data-aos="zoom-in" class="col-md-6 d-flex align-items-center">
                        <div class="wrapper_img_fitur">
                            <img class="img_fitur" src="{{ @asset('assets/images/products/gambar1.jpg') }}"
                                alt="">
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" style="height: 500px;">
                        <img src="{{ @asset('assets/images/products/gambar6.jpg') }}" class="card-img-top" style="height: 250px;"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
                            <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka
                                sembako</p>
                            <div class="ketUmkm">
                                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                                <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" style="height: 500px;">
                        <img src="{{ @asset('assets/images/products/gambar7.jpeg') }}" class="card-img-top" style="height: 250px;"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
                            <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka
                                sembako</p>
                            <div class="ketUmkm">
                                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                                <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500" style="height: 500px;">
                        <img src="{{ @asset('assets/images/products/gambar8.jpg') }}" class="card-img-top" style="height: 250px;"
                            alt="...">
                        <div class="card-body ">
              
                            <div class="umkmTitleSection">
                              <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
                              <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka
                                  sembako</p>
                          
                              <div class="ketUmkm">
                                  <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                                  <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" style="height: 400px;">
                        <img src="{{ @asset('assets/images/products/gambar2.jpeg') }}" class="card-img-top" style="height: 200px;"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Senam Pagi</h5>
                            <p class="">Pelaksanaan Senam Pagi di balai desa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" data-aos="fade-up" data-aos-duration="1000"   data-aos-delay="300" style="height: 400px;">
                        <img src="{{ @asset('assets/images/products/gambar9.jpg') }}" class="card-img-top" style="height: 200px;"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Syukuran desa</h5>
                            <p class="">Pelaksanaan syukuran unutk desa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500" style="height: 400px;">
                        <img src="{{ @asset('assets/images/products/gambar4.jpeg') }}" class="card-img-top" style="height: 200px;"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tanam Pohon</h5>
                            <p class="">Kegiatan penanaman pohon untuk memperingati hari jadi desa</p>
                        </div>
                    </div>
                </div>
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
                            <div class="form-group mb-3">
                                <label for="nama" class="form-label m-1">Nama Anda</label>
                                <input type="text" name="nama" id="nama" class="form-control bg-white">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label m-1">Email Anda</label>
                                <input type="email" name="email" id="email" class="form-control bg-white">
                            </div>
                            <div class="form-group mb-3">
                                <label for="subjek" class="form-label m-1">Subjek Anda</label>
                                <input type="text" name="subjek" id="subjek" class="form-control bg-white">
                            </div>
                            <div class="form-group mb-3">
                                <label for="pesan" class="form-label m-1">Pesan Anda</label>
                                <textarea type="text" name="pesan" id="pesan" class="form-control bg-white" style="height: 80px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
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
                            @copyright2024
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
    <script>
        let navbarOpen = false;
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
