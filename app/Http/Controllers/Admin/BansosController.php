<?php

namespace App\Http\Controllers\Admin;

use App\Models\RekomendasiBansosSPKVikorModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\KartuKeluargaModel;
use App\Http\Controllers\Controller;
use App\Models\PengajuanBansosModel;
use App\Models\RekomendasiBansosModel;

class BansosController extends Controller
{
    // Function sidebar mengelola bansos
    public function kelolaBansos(){
        $pengajuanBansos = PengajuanBansosModel::with('kartuKeluarga')->where('status_verif', 'Belum Terverifikasi')->orderBy('pengajuan_id', 'asc')->get();

        return view('layout.admin.kelola_bansos', ['ajuanBansos' => $pengajuanBansos, 'no' => 1]);
    }

    public function getPDFPengajuan($idPengajuan) {
        $file = PengajuanBansosModel::find($idPengajuan);

        return response()->file(storage_path('app/' . $file->file_sktm));
    }

    public function terimaPengajuan($id) {
        PengajuanBansosModel::where('pengajuan_id', $id)->update([
            'status_verif' => 'Terverifikasi'
        ]);

        return redirect('/admin/kelola-bansos');
    }

    public function tolakPengajuan(Request $request, $id) {
        $request->validate([
            'alasan_penolakan' => 'required'
        ]);

        PengajuanBansosModel::where('pengajuan_id', $id)->update([
            'status_verif' => 'Ditolak',
            'alasan_tolak' => $request->alasan_penolakan
        ]);

        return redirect('/admin/kelola-bansos');
    }

    // Funtion sidebar history bansos
    public function historyBansos(){
        $historyBansos = PengajuanBansosModel::orderBy('pengajuan_id', 'asc')->get();

        return view('layout.admin.history_bansos', ['pengajuanBansos' => $historyBansos, 'no' => 1]);
    }

    // Function show rekomendasi spk untuk bansos
    public function rekomendasiBansos(){
        $rekomBansosSPKSAW = RekomendasiBansosModel::with('kartuKeluarga.user')->orderBy('rekomendasi_bansos_id', 'asc')->get()->map(function($user) {
            $users = $user->kartuKeluarga->user;
            $user->user_count = $users->count();
            $user->total_gaji = $users->sum('gaji_user');
            return $user;
        });

        $rekomBansosSPKVikor = RekomendasiBansosSPKVikorModel::with('kartuKeluarga.user')->orderBy('rekomendasi_vikor_id', 'asc')->get()->map(function($user) {
            $users = $user->kartuKeluarga->user;
            $user->user_count = $users->count();
            $user->total_gaji = $users->sum('gaji_user');
            return $user;
        });

        return view('layout.admin.rekomendasi_bansos', ['bansosSAW' => $rekomBansosSPKSAW, 'bansosVikor' => $rekomBansosSPKVikor, 'noSAW' => 1, 'noVikor' => 1]);
    }
}
