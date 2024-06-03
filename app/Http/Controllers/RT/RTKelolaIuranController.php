<?php

namespace App\Http\Controllers\RT;

use Carbon\Carbon;
use App\Models\IuranModel;
use App\Models\MigrasiIuran;
use Illuminate\Http\Request;
use App\Exports\ExportIuranExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PengeluaranKasRequest;

class RTKelolaIuranController extends Controller
{
    public function kelolaIuran(){
        return view('layout.rt.kelola_iuran');
    }

    public function laporanIuran(){
        // Untuk mengambil semua data iuran
        $iuran = IuranModel::with('kartuKeluarga')->get();
        $totalSaldo = MigrasiIuran::orderBy('migrasi_iuran_id', 'desc')->first();

        return view('layout.rt.laporan_iuran', ['dataIuran' => $iuran, 'totalSaldo' => $totalSaldo]);
    }

    public function createPengeluaranIuran(PengeluaranKasRequest $request) {
        $request->validated();

        $saldoTerakhir = MigrasiIuran::orderBy('migrasi_iuran_id', 'desc')->first();

        if($request->hasFile('bukti_struk')){

            $bukti_struk = Storage::disk('public')->put('bukti_pengeluaran', $request->file('bukti_struk'));

            MigrasiIuran::create([
                'nama_pelapor' => $request->nama_pelapor,
                'jabatan_pelapor' => $request->jabatan_pelapor,
                'nomor_rt' => $request->nomor_rt,
                'nomor_rw' => $request->nomor_rw,
                'bukti_struk' => $bukti_struk,
                'keterangan_pengeluaran' => $request->keterangan_pengeluaran,
                'tanggal_migrasi' => Carbon::now(),
                'dana_keluar' => $request->jumlah_pengeluaran,
                'sisa_saldo' => $saldoTerakhir->sisa_saldo - (double)$request->jumlah_pengeluaran
            ]);
        }

        return redirect('/rt/kelola-iuran');
    }

    // Function Download Excel
    public function downloadExcel(){
        return Excel::download(new ExportIuranExcel, 'rekap_laporan_iuran.xlsx');
    }
}
