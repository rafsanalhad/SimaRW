<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratModel;

class RTKelolaSuratController extends Controller
{
    public function kelolaSurat(){
        // Untuk mengambil semua data surat
        $surat = SuratModel::with('user')->with('detail')->orderBy('surat_id')->get();

        return view('layout.rt.kelola_surat', ['dataSurat' => $surat, 'no' => 1]);
    }
}
