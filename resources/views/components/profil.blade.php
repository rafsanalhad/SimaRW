<?php
   $role_id = Auth::user()->role_id;
   $nama = Auth::user()->nama_user;
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
         <p style="font-size: 10px; margin-top: 50px;" class="sapaanRole">Selamat Datang,</p><br>
     
     
     
         <span style="font-size: 12px; font-weight: 700;" class="namaRole">{{ $role}} {{$nama}}</span>
     </div>
     <a style="display: inline;" class="nav-link nav-icon-hover" class="" href="javascript:void(0)" id="drop2"
         data-bs-toggle="dropdown" aria-expanded="false">
         <img src="{{ asset('storage/' . Auth::user()->foto_user) }}" alt="" class="rounded-circle fotoRole">
     </a>

