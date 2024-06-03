<?php

namespace App\Http\Controllers\RT;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengajuanBansosModel;
use App\Models\RekomendasiBansosModel;

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
        $rekomBansosSPK = RekomendasiBansosModel::with('kartuKeluarga.user')->orderBy('rekomendasi_bansos_id', 'asc')->get()->map(function($user) {
            $users = $user->kartuKeluarga->user;
            $user->user_count = $users->count();
            $user->total_gaji = $users->sum('gaji_user');
            return $user;
        });

        return view('layout.rt.rekomendasi_bansos', ['bansosRekom' => $rekomBansosSPK, 'no' => 1]);
    }
}
