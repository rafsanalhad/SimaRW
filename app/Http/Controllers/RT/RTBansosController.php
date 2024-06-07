<?php

namespace App\Http\Controllers\RT;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengajuanBansosModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RekomendasiBansosModel;
use App\Exports\PenerimaBansosSAWExcel;
use App\Exports\PenerimaBansosVikorExcel;
use App\Models\RekomendasiBansosSPKVikorModel;

class RTBansosController extends Controller
{
    // Function sidebar mengelola bansos
    public function kelolaBansos(){
        $pengajuanBansos = PengajuanBansosModel::with('kartuKeluarga')->where('status_verif', 'Belum Terverifikasi')->orderBy('pengajuan_id', 'asc')->get();

        return view('layout.rt.kelola_bansos', ['ajuanBansos' => $pengajuanBansos, 'no' => 1]);
    }

    public function getPDFPengajuan($idPengajuan) {
        $file = PengajuanBansosModel::find($idPengajuan);

        return response()->file(storage_path('app/' . $file->file_sktm));
    }

    public function terimaPengajuan($id) {
        PengajuanBansosModel::where('pengajuan_id', $id)->update([
            'status_verif' => 'Terverifikasi'
        ]);

        return redirect('/rt/kelola-bansos');
    }

    public function tolakPengajuan($id) {
        PengajuanBansosModel::where('pengajuan_id', $id)->update([
            'status_verif' => 'Ditolak'
        ]);

        return redirect('/rt/kelola-bansos');
    }

    // Funtion sidebar history bansos
    public function historyBansos(){
        $historyBansos = PengajuanBansosModel::orderBy('pengajuan_id', 'asc')->get();

        return view('layout.rt.history_bansos', ['pengajuanBansos' => $historyBansos, 'no' => 1]);
    }

    // Function show rekomendasi spk untuk bansos
    public function rekomendasiBansos(){
        $rekomBansosSPKSAW = RekomendasiBansosModel::with('kartuKeluarga.user')->where('status', 'Layak')->orderBy('rekomendasi_bansos_id', 'asc')->get()->map(function($user) {
            $users = $user->kartuKeluarga->user;
            $user->user_count = $users->count();
            $user->total_gaji = $users->sum('gaji_user');
            return $user;
        });

        $rekomBansosSPKVikor = RekomendasiBansosSPKVikorModel::with('kartuKeluarga.user')->where('status', 'Layak')->orderBy('rekomendasi_vikor_id', 'asc')->get()->map(function($user) {
            $users = $user->kartuKeluarga->user;
            $user->user_count = $users->count();
            $user->total_gaji = $users->sum('gaji_user');
            return $user;
        });

        return view('layout.rt.rekomendasi_bansos', ['bansosSAW' => $rekomBansosSPKSAW, 'bansosVikor' => $rekomBansosSPKVikor, 'noSAW' => 1, 'noVikor' => 1]);
    }

    public function downloadExcelSAW() {
        return Excel::download(new PenerimaBansosSAWExcel, 'rekap_rekomendasi_bansos_saw.xlsx');
    }

    public function downloadExcelVikor() {
        return Excel::download(new PenerimaBansosVikorExcel, 'rekap_rekomendasi_bansos_vikor.xlsx');
    }
}
