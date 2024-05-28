<?php

namespace App\Http\Controllers\Warga;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\KartuKeluargaModel;
use App\Http\Controllers\Controller;
use App\Models\PengajuanBansosModel;
use Illuminate\Support\Facades\Auth;

class BansosController extends Controller
{
    public function pengajuanBansos(){
        return view('layout.warga.pengajuan_bansos');
    }

    public function historyBansos(){
        $bansos = PengajuanBansosModel::where('kartu_keluarga_id', Auth::user()->kartu_keluarga_id)->with('kartuKeluarga')->get();
        $rerataGaji = round(UserModel::where('kartu_keluarga_id', Auth::user()->kartu_keluarga_id)->average('gaji_user'));

        return view('layout.warga.penerima_bansos', ['bansos' => $bansos, 'rerataGaji' => $rerataGaji ,'no' => 1]);
    }

    public function rekomendasiBansos(){
        return view('layout.warga.rekomendasi_bansos');
    }
}
