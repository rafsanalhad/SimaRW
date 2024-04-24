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
        <i class="ti ti-bell-ringing me-3" onclick="showModalPengumuman()"></i>
        <a href="#" class="btn btn-primary" onclick="showModalTambahPengumuman()">
          <div class="fs-1">Tambah Pengumuman</div>
        </a>
      </li>
    </ul>
  </nav>
</header>
<!--  Header End -->
<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-8 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
          <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
            <div class="mb-3 mb-sm-0">
              <h5 class="card-title fw-semibold">Grafik Pengeluaran Iuran</h5>
            </div>
            <div>
              <select class="form-select">
                <option value="1">March 2023</option>
                <option value="2">April 2023</option>
                <option value="3">May 2023</option>
                <option value="4">June 2023</option>
              </select>
            </div>
          </div>
          <div id="chart"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card overflow-hidden">
            <div class="card-body p-4">
              <h5 class="card-title mb-9 fw-semibold">Keuangan</h5>
              <div class="row align-items-center">
                <div class="col-12">
                  <div class="d-flex justify-content-center">
                    <div id="breakup"></div>
                  </div>
                  <h4 class="fw-semibold mb-3">Rp. 10.000.000</h4>
                  <div class="d-flex align-items-center mb-3">
                    <span
                      class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                      <i class="ti ti-arrow-up-left text-success"></i>
                    </span>
                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                    <p class="fs-3 mb-0">last year</p>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="me-4">
                      <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                      <span class="fs-2">2023</span>
                    </div>
                    <div>
                      <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                      <span class="fs-2">2023</span>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="mb-4">
            <h5 class="card-title fw-semibold">Detail Pengeluaran Baru</h5>
          </div>
          <ul class="timeline-widget mb-0 position-relative mb-n5">
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">beli semen buat bangun pos ronda</div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">beli semen buat bangun pos ronda <a href="javascript:void(0)"
                  class="text-primary d-block fw-normal"></a>
              </div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">beli semen buat bangun pos rond</div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">beli semen buat bangun pos rond <a href="javascript:void(0)"
                  class="text-primary d-block fw-normal"></a>
              </div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                <span class="timeline-badge-border d-block flex-shrink-0"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">beli semen buat bangun pos rond
              </div>
            </li>
            <li class="timeline-item d-flex position-relative overflow-hidden">
              <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
              <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
              </div>
              <div class="timeline-desc fs-3 text-dark mt-n1">beli semen buat bangun pos rond</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-8 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Pengeluaran</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
               
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Role</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Jumlah</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">1</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                    
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">RT</p>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">Rp. 10000000</h6>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">2</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">RW</p>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">10000000</h6>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">3</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Christopher Jamil</h6>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">RW</p>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">10.00000</h6>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">4</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                  </td>
                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">RW</p>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">Rp.100000</h6>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2" onclick=showModalUmkm()>
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="{{@asset('assets/images/products/s4.jpg')}}" class="card-img-top rounded-0"
              alt="..."></a>
          <a href="javascript:void(0)"
            class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
              class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-4">Toko Kelontong Pak Alhad wibu wibu anjay kau</h6>
          <div class="d-flex align-items-center justify-content-between">
            <p class="fw-semibold fs-1 mb-0">Jam Operasional: 08.00 - 19.00</p>
            {{-- <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul> --}}
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
        class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
        href="https://themewagon.com">ThemeWagon</a></p>
  </div>
</div>
<div class="modal modal_umkm" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
        <img src="{{asset('assets/images/content/img_hero.png')}}" alt="" class="img_umkm">
        <h3>Toko Kelontong Pak Alhad</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ut fringilla magna, non molestie enim.
          Donec convallis sagittis lacinia. Morbi eu semper erat, eget tempor libero. Sed ac risus vitae nulla semper
          imperdiet et non sem. Sed convallis viverra elit in varius. Integer non nisi ac eros ullamcorper finibus at
          pulvinar ex. Proin euismod tincidunt molestie. Fusce vestibulum elit aliquet placerat condimentum. Curabitur
          in libero nisi. Maecenas accumsan nec ipsum at vestibulum.</p>
        <div class="row">
          <div class="col-6">
            <h3 class="fs-4">Jam Operasi:</h3>
            <p>Setiap Hari jam 08.00 - 19.00</p>
          </div>
          <div class="col-6">
            <h3 class="fs-4">Kontak:</h3>
            <p>085763357188275</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick=hideModalUmkm()>Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal modal_pengumuman" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
        <h3>Pengumuman </h3>
        <div class="card">
          <div class="card-body">
            <div class="pengumuman_item mt-3">
              <div class="card">
                <div class="card-body">
                  <h4>Bansos</h4>
                  <p>Silahkan mengambil bansos di Balai desa</p>
                  <div class="row">
                    <div class="col-4">
                      Hari/Tanggal
                    </div>
                    <div class="col-6">
                      : Rabu/ 27 Maret 2024
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      Jam
                    </div>
                    <div class="col-6">
                      : 17.00 - 19.00
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      Tempat
                    </div>
                    <div class="col-6">
                      : Balai Desa
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="pengumuman_item mt-5">
              <div class="card">
                <div class="card-body">
                  <h4>Bansos</h4>
                  <p>Silahkan mengambil bansos di Balai desa</p>
                  <div class="row">
                    <div class="col-4">
                      Hari/Tanggal
                    </div>
                    <div class="col-6">
                      : Rabu/ 27 Maret 2024
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      Jam
                    </div>
                    <div class="col-6">
                      : 17.00 - 19.00
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      Tempat
                    </div>
                    <div class="col-6">
                      : Balai Desa
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideModalPengumuman()">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal modal_tambah_pengumuman" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
        <h3>Pengumuman </h3>
        <div class="card">
         <div class="card-body">
          <h3>Tambah Pengumuman</h3>
          <form action="" class="form">
            <div class="row d-flex align-items-center mt-3">
              <div class="col-4">
                Judul Pengumuman
              </div>
              <div class="col-6">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row d-flex align-items-center mt-3">
              <div class="col-4">
                Tanggal
              </div>
              <div class="col-6">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row d-flex align-items-center mt-3">
              <div class="col-4">
                Nomor RW
              </div>
              <div class="col-6">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row d-flex align-items-center mt-3">
              <div class="col-4">
                Masa Jabatan
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
          </form>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick=hideModalTambahPengumuman()>Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  function showModalUmkm(){
      $('.modal_umkm').modal('show');
    }
    function hideModalUmkm(){
      $('.modal_umkm').modal('hide');
    }
    function showModalPengumuman(){
      $('.modal_pengumuman').modal('show');
    }
    function hideModalPengumuman(){
      $('.modal_pengumuman').modal('hide');
    }
    function showModalTambahPengumuman(){
      $('.modal_tambah_pengumuman').modal('show');
    }
    function hideModalTambahPengumuman(){
      $('.modal_tambah_pengumuman').modal('hide');
    }
</script>
@endsection