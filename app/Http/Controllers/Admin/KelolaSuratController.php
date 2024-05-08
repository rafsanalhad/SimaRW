<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailSuratModel;
use App\Models\SuratModel;
use Illuminate\Http\Request;

class KelolaSuratController extends Controller
{
    public function kelolaSurat(){
        // Untuk mengambil semua data iuran
        $surat = SuratModel::with('user')->with('detail')->orderBy('surat_id')->get();

        return view('layout.admin.kelola_surat', ['dataSurat' => $surat, 'no' => 1]);
    }
}
