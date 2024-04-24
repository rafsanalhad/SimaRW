<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.admin.dashboard');
    }
    public function kelolaWarga(){
        return view('layout.admin.kelola_warga');
    }
    public function kelolaRt(){
        return view('layout.admin.kelola_rt');
    }
    public function kelolaRw(){
        return view('layout.admin.kelola_rw');
    }
    public function kelolaUmkm(){
        return view('layout.admin.kelola_umkm');
    }
    public function kelolaBansos(){
        return view('layout.admin.kelola_bansos');
    }
    public function kelolaIuran(){
        return view('layout.admin.kelola_iuran');
    }
    public function laporanIuran(){
        return view('layout.admin.laporan_iuran');
    }
    public function laporanPengaduan(){
        return view('layout.admin.laporan_pengaduan');
    }
    public function historyPengaduan(){
        return view('layout.admin.history_pengaduan');
    }
    public function kelolaSurat(){
        return view('layout.admin.kelola_surat');
    }
}
