<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\DetailSuratModel;
use App\Models\SuratModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{
    public function index(){
        $surat = SuratModel::with('user')->with('detail')->orderBy('surat_id')->where('user_id', Auth::id())->get();

        return view('layout.warga.pengajuan_surat', ['surat' => $surat, 'no' => 1]);
    }

    public function createSurat(Request $request) {
        $request->validate([
            'tipe_surat' => 'required',
            'keterangan_surat' => 'required'
        ]);
        $surat = SuratModel::create([
            'user_id' => Auth::id(),
            'jenis_surat' => $request->tipe_surat,
            'status_surat' => 'Pending'
        ]);

        DetailSuratModel::create([
            'surat_id' => $surat->surat_id,
            'tanggal_surat' => Carbon::now()->format('Y/m/d'),
            'keterangan_surat' => $request->keterangan_surat,
            'tanda_tangan_rt' => 'tandaTanganRT.jpg',
            'tanda_tangan_rw' => 'tandaTanganRW.jpg'
        ]);

        return redirect('/warga/pengajuan-surat');
    }
}
