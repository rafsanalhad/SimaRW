<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{@asset('assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="{{@asset('assets/css/home.css')}}">
  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    .html{
        font-family: 'Poppins' !important;
    }
    img{
      pointer-events: none;
    }
    .wrapper {
    background-image: url("{{@asset('assets/images/backgrounds/bg_home.png')}}");
    background-size: 100%;
    background-repeat: no-repeat;
    height: 100vh;
    
}
.img_hero{
    width: 221px;
    height: 35x;
}
.text_hero{
    font-size: 30px;
}
  </style>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="{{@asset('assets/images/logos/logo.png')}}" alt=""></a>
            </div>
          </nav>
          <div class="container-fluid">
            <div class="row align-items-center" style="height: 70vh;">
                <div class="col-md-6 align-items-center">
                    <div class="">
                        <img src="{{@asset('assets/images/logos/logo.png')}}" class="img_hero" alt="">
                        <p class="text_hero mt-4">Selamat datang di Sistem informasi <br> Manajemen warga. Kelola dan akses <br>informasi warga di SIMA.</p>
                        <button class="btn btn-primary">Login</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{@asset('assets/images/content/img_hero.png')}}" alt="">
                </div>
            </div>
          </div>
    </div>
  <script src="{{@asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{@asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{@asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{@asset('assets/js/app.min.js')}}"></script>
  <script src="{{@asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{@asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{@asset('assets/js/dashboard.js')}}"></script>
</body>

</html>