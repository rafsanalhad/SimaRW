<?php

namespace App\Http\Controllers\Warga;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PengaduanWargaModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index(){
        $pengaduan = PengaduanWargaModel::with(['user.kartuKeluarga'])->where('user_id', Auth::user()->user_id)->get();

        return view('layout.warga.pengaduan_warga',['pengaduan' => $pengaduan]);
    }

    public function createPengaduan(Request $request) {
        $request->validate([
            'isi_pengaduan' => 'required',
            'nomor_rt' => 'required',
            'nomor_rw' => 'required',
            'bukti_pengaduan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        if($request->hasFile('bukti_pengaduan')) {
            $file = Storage::disk('public')->put('pengaduan', $request->file('bukti_pengaduan'));

            PengaduanWargaModel::create([
                'user_id' => $request->user_id,
                'nomor_rt' => $request->nomor_rt,
                'nomor_rw' => $request->nomor_rw,
                'tanggal_pengaduan' => Carbon::now(),
                'isi_pengaduan' => $request->isi_pengaduan,
                'gambar_pengaduan' => $file,
                'status_pengaduan' => 'Diproses'
            ]);
        }

        return redirect('/warga/pengaduan');
    }
}
