<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanWargaRequest;
use App\Models\KegiatanWargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanWargaController extends Controller
{
    public function kelolaKegiatan(){
        $kegiatan = KegiatanWargaModel::all();

        return view('layout.admin.kegiatan_warga', ['kegiatan' => $kegiatan]);
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

        return redirect('/admin/kegiatan-warga');
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

        return redirect('/admin/kegiatan-warga');
    }

    public function deleteKegiatan($id) {
        KegiatanWargaModel::where('kegiatan_id', $id)->delete();
    }
}
