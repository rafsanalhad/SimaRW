<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\DetailPengeluaranModel;
use App\Models\IuranModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index() {
        $pengeluaran = DetailPengeluaranModel::with('user')->take(5)->get();
        $pengeluaranDesc = DetailPengeluaranModel::orderBy('detail_pengeluaran_id', 'DESC')->take(5)->get();

        return view('layout.warga.dashboard', ['no' => 1, 'pengeluaran' => $pengeluaran, 'pengeluaranTerbaru' => $pengeluaranDesc]);
    }

    public function getBarChart() {
        
        // A. Pemasukan 
        // total bulan
        $resultsBulan = IuranModel::selectRaw('YEAR(tanggal_bayar) as tahun, MONTH(tanggal_bayar) as bulan')
            ->whereNotNull('tanggal_bayar')
            ->distinct()
            ->get();
        $jumlahBulan = $resultsBulan->count();

        // lunas dalam 1 bulan
        $resultsPemasukan = IuranModel::selectRaw('YEAR(tanggal_bayar) as tahun, MONTH(tanggal_bayar) as bulan, COUNT(*) as total')
            ->where('status', 'Lunas')
            ->groupBy('tahun', 'bulan')
            ->distinct()
            ->get();

        $jumlahLunas = $resultsPemasukan->pluck('total');
        $pemasukan = [$jumlahBulan];
            
        for ($i=0; $i < $jumlahBulan; $i++) { 
            $pemasukan[$i] = $jumlahLunas[$i] * 30000;
        }
        
        // B. Pengeluaran 
        // pengeluaran 1 bulan
        $resultsPengeluaran = DetailPengeluaranModel::selectRaw('YEAR(created_at) as tahun, MONTH(created_at) as bulan, SUM(jumlah_pengeluaran) as total')
            ->groupBy('tahun', 'bulan')
            ->distinct()
            ->get();
        $pengeluaran = $resultsPengeluaran->pluck('total');
        
        // C. Nama Bulan 
        // Memformat bulan menjadi nama bulan
        $bulan = [];
        Carbon::setLocale('id');
        foreach ($resultsPemasukan as $result) {
            $date = Carbon::createFromFormat('!m', $result->bulan);
            $result->nama_bulan = $date->translatedFormat('F');
            $bulan[] = $result->nama_bulan;
        }
        // dd($pemasukan);
        $data = [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'bulan' => $bulan
        ];
        
        return response()->json($data);    
    }
}
