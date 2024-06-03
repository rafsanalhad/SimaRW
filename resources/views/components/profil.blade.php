<?php 
if($user->role_id == 1){
    $role = 'Admin';
}else if($user->role_id == 2){
    $role = 'RT';
}else if($user->role_id == 3){
    $role = 'RW';
}else if($user->role_id == 4){
    $role = 'Warga';
}
 ?>
<div class="d-inline-block" style="">
    <p style="font-size: 10px; display: inline; margin-top: 50px;">Selamat Datang,</p><br>
    <span style="font-size: 12px; font-weight: 700;">{{ $role}} {{$user->nama_user}}</span>
</div>
<a style="display: inline;" class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
    data-bs-toggle="dropdown" aria-expanded="false">
    <img src="{{ url('/assets/images/profile/user-1.jpg') }}" alt="" width="50" height="50"
        class="rounded-circle">
</a>