<?php

namespace App\Http\Controllers\Warga;

use App\Models\UserModel;
use App\Models\IuranModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IuranController extends Controller
{
    public function index() {
        $warga = UserModel::where('user_id', Auth::user()->user_id)->first();

        $iuran = IuranModel::where('kartu_keluarga_id', $warga->kartu_keluarga_id)->with('kartuKeluarga')->orderBy('iuran_id', 'asc')->get();
        $iuranBelumLunas = IuranModel::where('kartu_keluarga_id', $warga->kartu_keluarga_id)->where('status', 'Belum Lunas')->get();

        return view('layout.warga.bayar_iuran', ['iuran' => $iuran, 'no' => 1, 'iuranBelumLunas' => $iuranBelumLunas]);
    }
}
