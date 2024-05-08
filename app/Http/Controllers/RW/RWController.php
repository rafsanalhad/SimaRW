<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RWController extends Controller
{
    public function index()
    {
        return view('layout.rw.dashboard');
    }
    public function kelolaBansos(){
        return view('layout.rw.kelola_bansos');
    }
    public function kelolaIuran(){
        return view('layout.rw.kelola_iuran');
    }
    public function laporanIuran(){
        return view('layout.rw.laporan_iuran');
    }
    public function laporanPengaduan(){
        return view('layout.rw.laporan_pengaduan');
    }
    public function historyPengaduan(){
        return view('layout.rw.history_pengaduan');
    }
    public function kelolaSurat(){
        return view('layout.rw.kelola_surat');
    }
}
