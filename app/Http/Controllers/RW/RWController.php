<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RWController extends Controller
{
    public function index()
    {
        return view('layout.rtrw.dashboard');
    }
    public function kelolaBansos(){
        return view('layout.rt.kelola_bansos');
    }
    public function kelolaIuran(){
        return view('layout.rt.kelola_iuran');
    }
    public function laporanIuran(){
        return view('layout.rt.laporan_iuran');
    }
    public function laporanPengaduan(){
        return view('layout.rt.laporan_pengaduan');
    }
    public function historyPengaduan(){
        return view('layout.rt.history_pengaduan');
    }
    public function kelolaSurat(){
        return view('layout.rt.kelola_surat');
    }
}
