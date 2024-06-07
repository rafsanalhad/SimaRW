<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\DetailPengeluaranModel;
use App\Models\IuranModel;
use App\Models\MigrasiIuran;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index() {
        $pengeluaranDesc = MigrasiIuran::orderBy('migrasi_iuran_id', 'DESC')->whereNotNull('dana_keluar')->take(5)->get();
        $tahun = MigrasiIuran::selectRaw('YEAR(tanggal_migrasi) as tahun')->orderBy('tahun', 'DESC')->distinct()->get();
        $resultSaldo = MigrasiIuran::orderBy('migrasi_iuran_id', 'DESC')->first();

        $formattedTotal = number_format($resultSaldo->sisa_saldo, 0, '', '.');

        return view('layout.rt.dashboard', ['no' => 1, 'pengeluaran' => $pengeluaranDesc, 'pengeluaranTerbaru' => $pengeluaranDesc, 'total' => $formattedTotal, 'category' => ['Pemasukan', 'Pengeluaran'], 'tahun' => $tahun]);
    }
}
