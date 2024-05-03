<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password SIMA</title>
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
                                <p>Masukkan Email Anda Untuk Mengirim Kode Verifikasi</p>
                                <form>
                                    <div class="mb-3">
                                        <label for="email_forgot" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email_forgot">
                                    </div>
                                    <a href="./kode-verif" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Kirim
                                        Kode</a>
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
