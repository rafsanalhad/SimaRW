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
    public function kegiatanWarga(){
        return view('layout.warga.kegiatan_warga');
    }
    public function umkm(){
        return view('layout.warga.umkm');
    }
    public function editProfil(){
        return view('layout.warga.edit_profil');
    }
    public function pengajuanBansos(){
        return view('layout.warga.pengajuan_bansos');
    }
    public function pengaduan(){
        return view('layout.warga.pengaduan');
    }
    public function laporanIuran(){
        return view('layout.warga.laporan_iuran');
    }
}
