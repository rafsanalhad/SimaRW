<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(){
        return view('layout.warga.dashboard');
    }
    public function bayarIuran(){
        return view('layout.warga.bayar_iuran');
    }

    public function profilWarga(){
        return view('layout.warga.profil_warga');
    }


    public function pengajuanSurat(){
        return view('layout.warga.pengajuan_surat');
    }
}
