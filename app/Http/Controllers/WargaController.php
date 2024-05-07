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
    public function profilWarga(){
        return view('layout.warga.profil_warga');
    }
    public function pengajuanBansos(){
        return view('layout.warga.pengajuan_bansos');
    }
    public function penerimaBansos(){
        return view('layout.warga.penerima_bansos');
    }
    public function pengajuanSurat(){
        return view('layout.warga.pengajuan_surat');
    }
    public function pengaduanWarga(){
        return view('layout.warga.pengaduan_warga');
    }
    public function laporanIuran(){
        return view('layout.warga.laporan_iuran');
    }
}
