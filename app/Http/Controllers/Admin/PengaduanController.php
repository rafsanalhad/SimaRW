<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengaduanWargaModel;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function laporanPengaduan(){
        $laporan = PengaduanWargaModel::orderBy('pengaduan_id', 'asc')->with('user')->where('status_pengaduan', 'Diproses')->get();

        return view('layout.admin.laporan_pengaduan', ['laporan' => $laporan, 'no' => 1]);
    }

    public function updateTolakPengaduan(Request $request, $id) {
        $request->validate([
            'alasan_penolakan' => 'required'
        ]);

        PengaduanWargaModel::where('pengaduan_id', $id)->update([
            'status_pengaduan' => 'Ditolak',
            'alasan_tolak' => $request->alasan_penolakan
        ]);

        return redirect('/admin/laporan-pengaduan');
    }

    public function updateTerimaPengaduan($id) {
        PengaduanWargaModel::where('pengaduan_id', $id)->update(['status_pengaduan' => 'Selesai']);

        return redirect('/admin/laporan-pengaduan');
    }

    public function historyPengaduan(){
        $pengaduanWarga = PengaduanWargaModel::orderBy('pengaduan_id', 'asc')->with('user')->get();

        return view('layout.admin.history_pengaduan', ['pengaduan' => $pengaduanWarga, 'no' => 1]);
    }
}
