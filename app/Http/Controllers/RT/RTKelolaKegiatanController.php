<?php

namespace App\Http\Controllers\RT;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\KegiatanWargaModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\KegiatanWargaRequest;

class RTKelolaKegiatanController extends Controller
{
    public function kelolaKegiatan(){
        Carbon::setLocale('id');

        $kegiatan = KegiatanWargaModel::all()->map(function($kegiatan) {
            $kegiatan->hari_kegiatan = Carbon::parse($kegiatan->jadwal_kegiatan)->isoFormat('dddd');
            $kegiatan->jam_awal = Carbon::parse($kegiatan->jam_awal)->format('H:i');
            $kegiatan->jam_akhir = Carbon::parse($kegiatan->jam_akhir)->format('H:i');

            return $kegiatan;
        });

        return view('layout.rt.kegiatan_warga', ['kegiatan' => $kegiatan]);
    }

    public function createKegiatan(KegiatanWargaRequest $request) {
        $request->validated();

        if($request->hasFile('foto_kegiatan')) {
            $foto_kegiatan = Storage::disk('public')->put('kegiatan_warga', $request->file('foto_kegiatan'));

            KegiatanWargaModel::create([
                'nama_kegiatan' => $request->nama_kegiatan,
                'tempat_kegiatan' => $request->tempat_kegiatan,
                'jadwal_kegiatan' => $request->jadwal_kegiatan,
                'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
                'jam_awal' => $request->jam_awal,
                'jam_akhir' => $request->jam_akhir,
                'foto_kegiatan' => $foto_kegiatan,
            ]);
        }

        return redirect('/rt/kegiatan-warga');
    }

    public function editKegiatan($id) {
        $kegiatan = KegiatanWargaModel::find($id);

        return response()->json($kegiatan);
    }

    public function updateKegiatan(KegiatanWargaRequest $request, $id) {
        $lastUpdateKegiatan = KegiatanWargaModel::find($id);

        if($request->hasFile('foto_kegiatan')) {
            if($lastUpdateKegiatan->foto_kegiatan != null) {
                Storage::disk('public')->delete($lastUpdateKegiatan->foto_kegiatan);
            }

            $foto_kegiatan = Storage::disk('public')->put('kegiatan_warga', $request->file('foto_kegiatan'));

            KegiatanWargaModel::where('kegiatan_id', $id)->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'tempat_kegiatan' => $request->tempat_kegiatan,
                'jadwal_kegiatan' => $request->jadwal_kegiatan,
                'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
                'jam_awal' => $request->jam_awal,
                'jam_akhir' => $request->jam_akhir,
                'foto_kegiatan' => $foto_kegiatan,
            ]);
        } else {
            KegiatanWargaModel::where('id', $id)->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'tempat_kegiatan' => $request->tempat_kegiatan,
                'jadwal_kegiatan' => $request->jadwal_kegiatan,
                'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
                'jam_awal' => $request->jam_awal,
                'jam_akhir' => $request->jam_akhir,
            ]);
        }

        return redirect('/rt/kegiatan-warga');
    }

    public function deleteKegiatan($id) {
        KegiatanWargaModel::where('kegiatan_id', $id)->delete();
    }
}
