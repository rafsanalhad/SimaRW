<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Kode SIMA</title>
    <link rel="stylesheet" href="{{ url('/assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div href="#" class="text-center mb-3">
                                    <img src="{{ url('/assets/images/logos/simarwlogo.png') }}" alt="">
                                </div>
                                <p>Masukkan kode yang dikirimkan lewat Email anda</p>
                                <form action="/kode-verif" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="kode_verifikasi" class="form-label">Kode Verifikasi: </label>
                                        <input type="text" name="kode_verif" class="form-control" id="kode_verifikasi">
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Kirim
                                        Kode</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Tidak Menerima Kode?</p>
                                        <a class="text-primary fw-bold ms-2" href="#">Kirim Ulang</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Sudah Punya Akun?</p>
                                        <a class="text-primary fw-bold ms-2" href="./login">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
