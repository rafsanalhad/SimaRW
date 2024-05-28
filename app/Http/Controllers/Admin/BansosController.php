<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RekomendasiBansosModel;
use Illuminate\Http\Request;

class BansosController extends Controller
{
    // Function sidebar mengelola bansos
    public function kelolaBansos(){
        return view('layout.admin.kelola_bansos');
    }

    // Funtion sidebar history bansos
    public function historyBansos(){
        return view('layout.admin.history_bansos');
    }

    // Function show rekomendasi spk untuk bansos
    public function rekomendasiBansos(){
        $rekomBansosSPK = RekomendasiBansosModel::orderBy('rekomendasi_bansos_id', 'asc')->get();

        return view('layout.admin.rekomendasi_bansos', ['bansosRekom' => $rekomBansosSPK, 'no' => 1]);
    }
}
