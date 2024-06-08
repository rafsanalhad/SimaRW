<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UmkmModel;
use App\Models\UserModel;
use App\Models\LokasiUmkmModel;
use App\Http\Requests\UmkmRequest;
use Illuminate\Support\Facades\Storage;

class RTUMKMController extends Controller
{
    public function kelolaUmkm(){
        $umkm = UmkmModel::with('user')->get();
        $warga = UserModel::all();

        return view('layout.rt.kelola_umkm', ['umkm' => $umkm, 'warga' => $warga]);
    }

    public function createUmkm(UmkmRequest $request) {
        $request->validated();

        $foto_umkm = Storage::disk('public')->put('Umkm-Images', $request->file('foto_umkm'));

        $umkmSave = UmkmModel::create([
            'user_id' => $request->pemilik_umkm,
            'nama_umkm' => $request->nama_umkm,
            'alamat_umkm' => $request->alamat_umkm,
            'kontak_umkm' => $request->kontak_umkm,
            'jam_operasional_awal' => $request->jam_operasional_awal,
            'jam_operasional_akhir' => $request->jam_operasional_akhir,
            'deskripsi_umkm' => $request->deskripsi_umkm,
            'gambar_umkm' => $foto_umkm
        ]);

        if($umkmSave) {
            return redirect('/rt/kelola-umkm')->with('success', 'UMKM berhasil ditambahkan!');
        } else {
            return redirect('/rt/kelola-umkm')->with('error', 'UMKM gagal ditambahkan!');
        }
    }

    public function editUmkm($id) {
        $umkm = UmkmModel::find($id);

        return response()->json($umkm);
    }

    public function updateUmkm(UmkmRequest $request, $id) {
        $request->validated();

        if($request->file('foto_umkm')) {
            $old_foto = basename(UmkmModel::find($id)->gambar_umkm);
            Storage::disk('public')->delete('Umkm-Images/' . $old_foto);

            $foto_umkm = Storage::disk('public')->put('Umkm-Images', $request->file('foto_umkm'));

            $umkmSave = UmkmModel::where('umkm_id', $id)->update([
                'user_id' => $request->pemilik_umkm,
                'nama_umkm' => $request->nama_umkm,
                'alamat_umkm' => $request->alamat_umkm,
                'kontak_umkm' => $request->kontak_umkm,
                'jam_operasional_awal' => $request->jam_operasional_awal,
                'jam_operasional_akhir' => $request->jam_operasional_akhir,
                'deskripsi_umkm' => $request->deskripsi_umkm,
                'gambar_umkm' => $foto_umkm
            ]);
        } else {
            $umkmSave = UmkmModel::where('umkm_id', $id)->update([
                'user_id' => $request->pemilik_umkm,
                'nama_umkm' => $request->nama_umkm,
                'alamat_umkm' => $request->alamat_umkm,
                'kontak_umkm' => $request->kontak_umkm,
                'jam_operasional_awal' => $request->jam_operasional_awal,
                'jam_operasional_akhir' => $request->jam_operasional_akhir,
                'deskripsi_umkm' => $request->deskripsi_umkm,
            ]);
        }

        if($umkmSave) {
            return redirect('/rt/kelola-umkm')->with('success', 'UMKM berhasil diedit!');
        } else {
            return redirect('/rt/kelola-umkm')->with('error', 'UMKM gagal diedit!');
        }
    }

    public function deleteUmkm($id) {
        $foto_umkm = basename(UmkmModel::find($id)->gambar_umkm);
        Storage::disk('public')->delete('Umkm-Images/' . $foto_umkm);

        UmkmModel::where('umkm_id', $id)->delete();
    }
}
