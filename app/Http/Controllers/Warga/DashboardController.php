<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\DetailPengeluaranModel;
use App\Models\IuranModel;
use App\Models\MigrasiIuran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index() {
        $pengeluaranDesc = MigrasiIuran::orderBy('migrasi_iuran_id', 'DESC')->whereNotNull('dana_keluar')->take(5)->get();
        $tahun = MigrasiIuran::selectRaw('YEAR(tanggal_migrasi) as tahun')->orderBy('tahun', 'DESC')->distinct()->get();
        $resultSaldo = MigrasiIuran::orderBy('migrasi_iuran_id', 'DESC')->first();

        $formattedTotal = number_format($resultSaldo->sisa_saldo, 0, '', '.');

        return view('layout.warga.dashboard', ['no' => 1, 'pengeluaran' => $pengeluaranDesc, 'pengeluaranTerbaru' => $pengeluaranDesc, 'total' => $formattedTotal, 'category' => ['Pemasukan', 'Pengeluaran'], 'tahun' => $tahun]);
    }

    public function getBarChart($tahun) {
        
        // A. Pemasukan 
        // total bulan
        // $resultsBulan = MigrasiIuran::selectRaw('YEAR(tanggal_migrasi) as tahun, MONTH(tanggal_migrasi) as bulan')
        //     ->distinct()
        //     ->get();
        // $jumlahBulan = $resultsBulan->count();

        // lunas dalam 1 bulan
        $resultsPemasukan = MigrasiIuran::selectRaw('YEAR(tanggal_migrasi) as tahun, MONTH(tanggal_migrasi) as bulan, SUM(dana_masuk) as total_pemasukan, SUM(dana_keluar) as total_pengeluaran')
            ->whereYear('tanggal_migrasi', $tahun)
            ->groupBy('tahun', 'bulan')
            ->distinct()
            ->get();

        // $jumlahLunas = $resultsPemasukan->pluck('total');
        $pemasukan = [];
        $pengeluaran = [];
        $batasAtas = 0;

        foreach ($resultsPemasukan as $result) {
            $pemasukan[] = $result->total_pemasukan;
            if ($result->total_pengeluaran == null) {
                $pengeluaran[] = 0;
            }else{
                $pengeluaran[] = $result->total_pengeluaran;
            }
            // if($pemasukan > $pengeluaran){
            //     $batasAtas = $pemasukan;
            // }else{
            //     $batasAtas = $pengeluaran;
            // }
        }

        $batasAtas = max(array_merge($pemasukan, $pengeluaran));
        // dd($batasAtas);
            
        // for ($i=0; $i < $jumlahBulan; $i++) { 
        //     $pemasukan[$i] = $jumlahLunas[$i] * 30000;
        // }
        
        // B. Pengeluaran 
        // pengeluaran 1 bulan
        // $resultsPengeluaran = DetailPengeluaranModel::selectRaw('YEAR(created_at) as tahun, MONTH(created_at) as bulan, SUM(jumlah_pengeluaran) as total')
        //     ->groupBy('tahun', 'bulan')
        //     ->distinct()
        //     ->get();
        
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
            'bulan' => $bulan,
            'batasAtas' => $batasAtas
        ];
        
        return response()->json($data);    
    }

    public function getPieChart($tahun)
    {
        // A. Pemasukan 
        // lunas dalam 1 bulan
        // $resultsPemasukan = IuranModel::selectRaw('COUNT(*) as total')
        //     ->where('status', 'Lunas')
        //     ->distinct()
        //     ->count();
            
        // B. Pengeluaran 
        // pengeluaran 1 bulan
        $resultsIuran = MigrasiIuran::selectRaw('YEAR(tanggal_migrasi) as tahun, SUM(dana_masuk) as total_pemasukan, SUM(dana_keluar) as total_pengeluaran')
            ->whereYear('tanggal_migrasi', $tahun)
            ->groupBy('tahun')
            ->distinct()
            ->get();

        $pemasukan = 0;
        $pengeluaran = 0;
        foreach ($resultsIuran as $r) {
            $pemasukan = $r->total_pemasukan;
            if ($r->total_pengeluaran == null) {
                $pengeluaran = 0;
            }else{
                $pengeluaran = $r->total_pengeluaran;
            }
        }
        $iuran = [$pemasukan, $pengeluaran];
        // dd($resultsIuran->pluck('total_pemasukan'));

        // C. Perubahan Income
        // Hitung persentase perubahan
        $resPreviousIncome = MigrasiIuran::selectRaw('YEAR(tanggal_migrasi) as tahun, SUM(dana_masuk) as total_pemasukan, SUM(dana_keluar) as total_pengeluaran')
            ->whereYear('tanggal_migrasi', $tahun - 1)
            ->groupBy('tahun')
            ->distinct()
            ->get();

        $pemasukanPrev = 0;
        $pengeluaranPrev = 0;
        foreach ($resPreviousIncome as $r) {
            $pemasukanPrev = $r->total_pemasukan;
            if ($r->total_pengeluaran == null) {
                $pengeluaranPrev = 0;
            }else{
                $pengeluaranPrev = $r->total_pengeluaran;
            }
        }

        $currentIncome = $pemasukan - $pengeluaran;
        $previousIncome = $pemasukanPrev - $pengeluaranPrev;
        if ($previousIncome == 0) {
            $percentageChange = $currentIncome > 0 ? 100 : 0;
        } else {
            $percentageChange = (($currentIncome - $previousIncome) / $previousIncome) * 100;
        }

        $percentageChange = number_format($percentageChange, 2);
        // dd($percentageChange); //jadi string btw

        $data = [
            'iuran' => $iuran,
            'category' => ['Pemasukan','Pengeluaran'],
            'percentage' => $percentageChange
        ];
        
        return response()->json($data);    
    }    
}
