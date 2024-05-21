<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IuranModel;
class RTKelolaIuranController extends Controller
{
    public function laporanIuran(){
        // Untuk mengambil semua data iuran
        $iuran = IuranModel::with('kartuKeluarga')->get();

        return view('layout.rt.laporan_iuran', ['dataIuran' => $iuran]);
    }
}
