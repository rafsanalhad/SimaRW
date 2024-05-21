<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\DetailPengeluaranModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $pengeluaran = DetailPengeluaranModel::with('user')->take(5)->get();

        return view('layout.warga.dashboard', ['no' => 1, 'pengeluaran' => $pengeluaran]);
    }
}
