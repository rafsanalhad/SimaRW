<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\KartuKeluargaModel;
use App\Http\Controllers\Controller;
use App\Models\PengajuanBansosModel;
use App\Models\RekomendasiBansosModel;

class BansosController extends Controller
{
    // Function sidebar mengelola bansos
    public function kelolaBansos(){
        $pengajuanBansos = PengajuanBansosModel::with('kartuKeluarga')->where('status_verif', 'Belum Terverifikasi')->orderBy('pengajuan_id', 'asc')->get();

        return view('layout.admin.kelola_bansos', ['ajuanBansos' => $pengajuanBansos, 'no' => 1]);
    }

    // Funtion sidebar history bansos
    public function historyBansos(){
        return view('layout.admin.history_bansos');
    }

    // Function show rekomendasi spk untuk bansos
    public function rekomendasiBansos(){
        $rekomBansosSPK = RekomendasiBansosModel::with('kartuKeluarga.user')->orderBy('rekomendasi_bansos_id', 'asc')->get()->map(function($user) {
            $users = $user->kartuKeluarga->user;
            $user->user_count = $users->count();
            $user->total_gaji = $users->sum('gaji_user');
            return $user;
        });

        return view('layout.admin.rekomendasi_bansos', ['bansosRekom' => $rekomBansosSPK, 'no' => 1]);
    }
}
