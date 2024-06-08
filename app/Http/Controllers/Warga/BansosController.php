<?php

namespace App\Http\Controllers\Warga;

use Carbon\Carbon;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\KartuKeluargaModel;
use App\Http\Controllers\Controller;
use App\Models\PengajuanBansosModel;
use Illuminate\Support\Facades\Auth;
use App\Models\RekomendasiBansosModel;
use App\Http\Requests\PengajuanBansosRequest;
use App\Models\RekomendasiBansosSPKVikorModel;

class BansosController extends Controller
{
    public function pengajuanBansos(){
        $kepalaKeluarga = KartuKeluargaModel::where('kartu_keluarga_id', Auth::user()->kartu_keluarga_id)->first();

        return view('layout.warga.pengajuan_bansos', ['kepalaKeluarga' => $kepalaKeluarga]);
    }

    public function createPengajuanBansos(PengajuanBansosRequest $request) {
        $request->validated();

        if($request->hasFile('file_sktm')) {
            // Mengubah nama file pdf
            $file = $request->file('file_sktm');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $pdfPath = $file->storeAs('public/sktm', $fileName);

            // Menyimpan pdf ke database
            PengajuanBansosModel::create([
                'kartu_keluarga_id' => $request->kartu_keluarga_id,
                'pendapatan_keluarga' => $request->pendapatan_keluarga,
                'tanggungan_warga' => $request->tanggungan_warga,
                'nomor_rt' => $request->nomor_rt,
                'nomor_rw' => $request->nomor_rw,
                'alasan_warga' => $request->alasan_warga,
                'tanggal_pengajuan' => Carbon::now(),
                'file_sktm' => $pdfPath,
                'status_verif' => 'Belum Terverifikasi'
            ]);
        }

        return redirect('warga/pengajuan-bansos');
    }


    public function historyBansos(){
        $bansos = PengajuanBansosModel::with('kartuKeluarga')->where('kartu_keluarga_id', Auth::user()->kartu_keluarga_id)->get();

        return view('layout.warga.penerima_bansos', ['bansos' => $bansos, 'no' => 1]);
    }

    public function allHistoryPengajuanBansos() {
        $bansos = PengajuanBansosModel::with('kartuKeluarga')->whereIn('status_verif', ['Terverifikasi', 'Ditolak'])->orderBy('pengajuan_id', 'asc')->get();

        return view('layout.warga.transparansi_bansos', ['bansos' => $bansos, 'no' => 1]);
    }

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

        return view('layout.warga.rekomendasi_bansos', ['bansosSAW' => $rekomBansosSPKSAW, 'bansosVikor' => $rekomBansosSPKVikor, 'noSAW' => 1, 'noVikor' => 1]);
    }

    public function historyPenerimaBansos(){
        return view('layout.warga.transparansi_bansos');
    }
}
