<?php

namespace App\Http\Controllers\rtrw;
use App\Http\Controllers\Controller;

class RtRwController extends Controller
{
    public function index()
    {
        return view('layout.rtrw.dashboard');
    }

    // public function kelolaBansos(){
    //     return view('layout.admin.kelola_bansos');
    // }
    // public function kelolaIuran(){
    //     return view('layout.admin.kelola_iuran');
    // }
    // public function laporanIuran(){
    //     return view('layout.admin.laporan_iuran');
    // }
    // public function laporanPengaduan(){
    //     return view('layout.admin.laporan_pengaduan');
    // }
    // public function historyPengaduan(){
    //     return view('layout.admin.history_pengaduan');
    // }
    // public function kelolaSurat(){
    //     return view('layout.admin.kelola_surat');
    // }
}
