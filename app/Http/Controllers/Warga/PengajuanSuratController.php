<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\SuratModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{
    public function index(){
        $surat = SuratModel::with('user')->with('detail')->orderBy('surat_id')->where('user_id', Auth::id())->get();

        return view('layout.warga.pengajuan_surat', ['surat' => $surat, 'no' => 1]);
    }
}
