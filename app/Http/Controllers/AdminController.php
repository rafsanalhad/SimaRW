<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.admin.dashboard');
    }
    public function kelolaWarga(){
        // Untuk mengambil data warga yang memiliki role warga
        $warga = UserModel::with('kartuKeluarga')->where('role_id', 4)->orderBy('user_id')->get();

        return view('layout.admin.kelola_warga', ['dataWarga' => $warga, 'no' => 1]);
    }
    public function kelolaRt(){
        $rt = UserModel::with('kartuKeluarga')->where('role_id', 2)->orderBy('user_id')->get();

        return view('layout.admin.kelola_rt', ['dataRT' => $rt, 'no' => 1]);
    }
    public function kelolaRw(){
        $rw = UserModel::with('kartuKeluarga')->where('role_id', 3)->orderBy('user_id')->get();

        return view('layout.admin.kelola_rw', ['dataRW' => $rw, 'no' => 1]);
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
