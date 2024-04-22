<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMA</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{@asset('assets/css/dashboard_admin.css')}}" />
  <link rel="stylesheet" href="{{@asset('assets/css/styles.min.css')}}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    
    @include('template.admin.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      @yield('content')
    </div>
  </div>
  <script src="{{@asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{@asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{@asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{@asset('assets/js/app.min.js')}}"></script>
  <script src="{{@asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{@asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{@asset('assets/js/dashboard.js')}}"></script>
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script>
  new DataTable('#table-warga');
</script>

  @stack('js')
</body>

</html>