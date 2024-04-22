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
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
              <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
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
                <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="container-fluid">
    {{-- <h3>Data Warga</h3> --}}
    <div class="card shadow-lg" >
        <div class="card-body">
            <h4>Kelola Data Warga</h4>
            <table class="table" id="table-warga">
                <thead>
                    <th>No</th>
                <th>Nama Warga</th>
                <th>NIK</th>
                <th>TTL</th>
                <th>Jen. Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Pekerjaan</th>
                <th>Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            Rizky Arifiansyah
                        </td>
                        <td>35171310297771</td>
                        <td>Sorong, 12 April 1989</td>
                        <td>Laki-laki</td>
                        <td>Islam</td>
                        <td>Jl. Soehat, Malang RT 01 RW 07</td>
                        <td>Belum Kawin</td>
                        <td>Dokter</td>
                        <td>
                          <div style="display: flex;">
                              <a href="" class="btn btn-warning" style="margin-right: 5px;"><i class="bi bi-pencil-square"></i></a>
                              <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                          </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal modal_tambah_warga" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Warga</h5>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick=hideModalUmkm()>Close</button>
          </div>
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
  </script>
  <script>
    new DataTable('#table-warga');
  </script>
@endsection