<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengaduanWargaModel;

class RTPengaduanController extends Controller
{
    public function laporanPengaduan(){
        $laporan = PengaduanWargaModel::orderBy('pengaduan_id', 'asc')->with('user')->where('status_pengaduan', 'Diproses')->get();

        return view('layout.rt.laporan_pengaduan', ['laporan' => $laporan, 'no' => 1]);
    }

    public function updateTolakPengaduan(Request $request, $id) {
        $request->validate([
            'alasan_penolakan' => 'required'
        ]);

        PengaduanWargaModel::where('pengaduan_id', $id)->update([
            'status_pengaduan' => 'Ditolak',
            'alasan_tolak' => $request->alasan_penolakan
        ]);

        return redirect('/rt/laporan-pengaduan');
    }

    public function updateTerimaPengaduan($id) {
        PengaduanWargaModel::where('pengaduan_id', $id)->update(['status_pengaduan' => 'Selesai']);

        return redirect('/rt/laporan-pengaduan');
    }

    public function historyPengaduan(){
        $pengaduanWarga = PengaduanWargaModel::orderBy('pengaduan_id', 'asc')->with('user')->get();

        return view('layout.rt.history_pengaduan', ['pengaduan' => $pengaduanWarga, 'no' => 1]);
    }
}
