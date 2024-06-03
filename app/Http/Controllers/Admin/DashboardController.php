<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPengeluaranModel;
use App\Models\IuranModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $pengeluaran = DetailPengeluaranModel::with('user')->orderBy('detail_pengeluaran_id', 'DESC')->take(5)->get();
        $pengeluaranDesc = DetailPengeluaranModel::orderBy('detail_pengeluaran_id', 'DESC')->take(5)->get();

        $resultsPemasukan = IuranModel::selectRaw('COUNT(*) as total')
            ->where('status', 'Lunas')
            ->distinct()
            ->count();
        $pemasukanTotal = $resultsPemasukan * 30000;

        $resultsPengeluaran = DetailPengeluaranModel::selectRaw('SUM(jumlah_pengeluaran) as total')
            ->distinct()
            ->get();
        $pengeluaranTotal = 0;
        foreach ($resultsPengeluaran as $r) {
            $pengeluaranTotal = $r->total;
        }
        $total = 0;
        $total = ($total + $pemasukanTotal) - $pengeluaranTotal;
        $formattedTotal = number_format($total, 0, '', '.');

        return view('layout.admin.dashboard', ['no' => 1, 'pengeluaran' => $pengeluaran, 'pengeluaranTerbaru' => $pengeluaranDesc, 'total' => $formattedTotal, 'category' => ['Pemasukan', 'Pengeluaran']]);
    }
}
