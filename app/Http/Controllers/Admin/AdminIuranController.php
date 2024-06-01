<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengeluaranKasRequest;
use App\Models\MigrasiIuran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminIuranController extends Controller
{
    public function kelolaIuran(){
        return view('layout.admin.kelola_iuran');
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

        return redirect('/admin/kelola-iuran');
    }
}
