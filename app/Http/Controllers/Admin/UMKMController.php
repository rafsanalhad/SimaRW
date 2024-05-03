<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UmkmRequest;
use App\Models\UmkmModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function kelolaUmkm(){
        $umkm = UmkmModel::with('user')->get();
        $warga = UserModel::all();

        return view('layout.admin.kelola_umkm', ['umkm' => $umkm, 'warga' => $warga]);
    }

    public function createUmkm(UmkmRequest $request) {
        $request->validated();

        UmkmModel::create([
            'user_id' => $request->pemilik_umkm,
            'nama_umkm' => $request->nama_umkm,
            'alamat_umkm' => $request->alamat_umkm,
            'kontak_umkm' => $request->kontak_umkm,
            'jam_operasional_awal' => $request->jam_operasional_awal,
            'jam_operasional_akhir' => $request->jam_operasional_akhir,
            'deskripsi_umkm' => $request->deskripsi_umkm
        ]);

        return redirect('/admin/kelola-umkm');
    }

    public function editUmkm($id) {
        $umkm = UmkmModel::find($id);

        return response()->json($umkm);
    }

    public function updateUmkm(UmkmRequest $request, $id) {
        $request->validated();

        UmkmModel::where('umkm_id', $id)->update([
            'user_id' => $request->pemilik_umkm,
            'nama_umkm' => $request->nama_umkm,
            'alamat_umkm' => $request->alamat_umkm,
            'kontak_umkm' => $request->kontak_umkm,
            'jam_operasional_awal' => $request->jam_operasional_awal,
            'jam_operasional_akhir' => $request->jam_operasional_akhir,
            'deskripsi_umkm' => $request->deskripsi_umkm
        ]);

        return redirect('/admin/kelola-umkm');
    }

    public function deleteUmkm($id) {
        UmkmModel::where('umkm_id', $id)->delete();
    }
}
