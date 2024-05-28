<?php

namespace App\Http\Controllers\Admin;

use App\Models\IuranModel;
use Illuminate\Http\Request;
use App\Exports\ExportIuranExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class KelolaIuranController extends Controller
{
    // Function menampilkan data RW
    public function laporanIuran(){
        // Untuk mengambil semua data iuran
        $iuran = IuranModel::with('kartuKeluarga')->get();

        return view('layout.admin.laporan_iuran', ['dataIuran' => $iuran]);
    }

    // Function Download Excel
    public function downloadExcel(){
        return Excel::download(new ExportIuranExcel, 'laporan_iuran.xlsx');
    }
}
