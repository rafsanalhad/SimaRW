<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{@asset('assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="{{@asset('assets/css/home.css')}}">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent shadow-lg">
      <div class="container-fluid px-5">
        <a class="navbar-brand" href="#"><img src="{{@asset('assets/images/logos/logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
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
            </li>
          </ul>
          <form class="d-flex">
            <a class="btn btn-primary me-2">Login</a>
            <a href="" class="btn btn-outline-primary">Register</a>
          </form>
        </div>
      </div>
    </nav>
    <section class="hero">
      <div class="container-fluid">
        <div class="row d-flex align-items-center">
          <div class="col-md-6 d-flex align-items-center" data-aos="fade-right">
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
          <div class="col-md-6 d-flex justify-content-center align-items-center" data-aos="fade-left">

            <img class="img_hero" src="{{@asset('assets/images/content/img_hero.png')}}" alt="">

          </div>
        </div>
      </div>
    </section>
    <section class="section fitur mt-5">
      <div class="container-fluid">
        <div class="row">
          <div data-aos="fade-right" class="col-md-6 d-flex align-items-center">
            <div class="wrapper_img_fitur">
              <img class="img_fitur" src="{{@asset('assets/images/content/wargakartun.png')}}" alt="">
            </div>
          </div>
          <div class="col-md-6" data-aos="fade-left">
            <div class="header_fitur mt-5">Nikmati Manfaat Fitur Kami Yang Sudah Terintegrasi Dengan RT dan RT setempat
            </div>
            <div class="text_fitur mb-3 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias nisi quae
              officiis
              quibusdam, ipsam reiciendis eos dolor, praesentium, aperiam beatae quisquam a voluptatum consectetur
              inventore ducimus nihil necessitatibus velit eligendi.</div>
            <div class="row">
              <div class="col-md-6">
                <div class="iconFitur d-flex justify-content-center align-items-center"> <i
                    class="bi bi-person iconBootstrap"></i></div>
                <div class="subHeaderFitur mb-2 mt-2">UI Yang Mudah</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempora expedita unde tempore eius illo
                  provident incidunt fugiat iste, sit ex, natus vitae cum consequatur?</p>
              </div>
              <div class="col-md-6">
                <div class="iconFitur d-flex justify-content-center align-items-center"> <i
                    class="bi bi-person iconBootstrap"></i></div>
                <div class="subHeaderFitur mb-2 mt-2">UI Yang Mudah</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempora expedita unde tempore eius illo
                  provident incidunt fugiat iste, sit ex, natus vitae cum consequatur?</p>
              </div>
              <div class="col-md-6">
                <div class="iconFitur d-flex justify-content-center align-items-center"> <i
                    class="bi bi-person iconBootstrap"></i></div>
                <div class="subHeaderFitur mb-2 mt-2">UI Yang Mudah</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempora expedita unde tempore eius illo
                  provident incidunt fugiat iste, sit ex, natus vitae cum consequatur?</p>
              </div>
              <div class="col-md-6">
                <div class="iconFitur d-flex justify-content-center align-items-center"> <i
                    class="bi bi-person iconBootstrap"></i></div>
                <div class="subHeaderFitur mb-2 mt-2">UI Yang Mudah</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempora expedita unde tempore eius illo
                  provident incidunt fugiat iste, sit ex, natus vitae cum consequatur?</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  </section>
  <section class="umkm mt-5 mb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="umkm_main_header mt-3 mb-5 text-center">UMKM Kami</div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
            <img src="{{@asset('assets/images/content/wargakartun.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
              <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka sembako</p>
              <div class="ketUmkm">
                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
            <img src="{{@asset('assets/images/content/wargakartun.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
              <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka sembako</p>
              <div class="ketUmkm">
                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
            <img src="{{@asset('assets/images/content/wargakartun.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
              <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka sembako</p>
              <div class="ketUmkm">
                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="kegiatan_warga">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1 class="kegiatan_warga_main_header mb-5 text-center">Kegiatan Warga</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            <img src="{{@asset('assets/images/content/wargakartun.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
              <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka sembako</p>
              <div class="ketKegiatanWarga">
                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <img src="{{@asset('assets/images/content/wargakartun.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
              <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka sembako</p>
              <div class="ketKegiatanWarga">
                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
            <img src="{{@asset('assets/images/content/wargakartun.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Toko Kelontong Pak Alhad</h5>
              <p class="">Toko yang menjual sayur dan buah buahan dan sayur sayuran dan aneka sembako</p>
              <div class="ketKegiatanWarga">
                <p class="m-0 p-0 ketBuka">Buka: Setiap Hari</p>
                <p class="m-0 p-0 jamBuka">Jam Buka: 08.000 - 22.00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer bg-white shadow-lg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center">
            <div class="footer_left">
              <img src="{{@asset('assets/images/logos/logo.png')}}" alt="">
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
  <script src="{{@asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{@asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{@asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{@asset('assets/js/app.min.js')}}"></script>
  <script src="{{@asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{@asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{@asset('assets/js/dashboard.js')}}"></script>
</body>

</html>