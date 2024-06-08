<?php
   $role_id = session('role_id');
   $nama = session('nama');
if($role_id == 1){
    $role = 'Admin';
}else if($role_id == 2){
    $role = 'RT';
}else if($role_id == 3){
    $role = 'RW';
}else if($role_id == 4){
    $role = 'Warga';
}
 ?>
<div class="d-inline-block" style="">
    <p style="font-size: 10px; display: inline; margin-top: 50px;">Selamat Datang,</p><br>



    <span style="font-size: 12px; font-weight: 700;">{{ $role}} {{$nama}}</span>
</div>
<a style="display: inline;" class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
    data-bs-toggle="dropdown" aria-expanded="false">
    <img src="{{ asset('storage/' . Auth::user()->foto_user) }}" alt="" width="50" height="50" class="rounded-circle">
</a>
