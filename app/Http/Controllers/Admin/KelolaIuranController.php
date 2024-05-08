<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IuranModel;
use Illuminate\Http\Request;

class KelolaIuranController extends Controller
{
    // Function menampilkan data RW
    public function laporanIuran(){
        // Untuk mengambil semua data iuran
        $iuran = IuranModel::with('kartuKeluarga')->get();

        return view('layout.admin.laporan_iuran', ['dataIuran' => $iuran]);
    }
}
