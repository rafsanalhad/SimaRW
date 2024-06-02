<?php

namespace App\Http\Controllers\Warga;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PengaduanWargaModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduan = PengaduanWargaModel::where('user_id', Auth::user()->user_id)->get();

        return view('layout.warga.pengaduan_warga',['pengaduan' => $pengaduan]);
    }

    public function createPengaduan(Request $request) {
        $request->validate([
            'isi_pengaduan' => 'required',
            'nomor_rt' => 'required',
            'nomor_rw' => 'required',
        ]);

        PengaduanWargaModel::create([
            'user_id' => $request->user_id,
            'nomor_rt' => $request->nomor_rt,
            'nomor_rw' => $request->nomor_rw,
            'tanggal_pengaduan' => Carbon::now(),
            'isi_pengaduan' => $request->isi_pengaduan,
            'status_pengaduan' => 'Diproses'
        ]);

        return redirect('/warga/pengaduan');
    }
}
