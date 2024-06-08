<?php

namespace App\Http\Controllers\rt;

use Illuminate\Http\Request;
use App\Exports\NKKExportExcel;
use App\Http\Requests\NKKRequest;
use App\Models\KartuKeluargaModel;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Maatwebsite\Excel\Facades\Excel;

class KelolaNKKController extends Controller
{
    public function showKK(){
        $kk = KartuKeluargaModel::withCount('user')->get();

        return view('layout.rt.kelola_nkk', ['dataKK' => $kk, 'no' => 1]);
    }

    public function createNKK(NKKRequest $request) {
        $request->validated;
        // dd($debug);

        KartuKeluargaModel::create([
            'no_kartu_keluarga' => $request->no_kartu_keluarga,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alamat_kk' => $request->alamat_kk,
            'jumlah_tanggungan' => $request->jumlah_tanggungan,
            'kondisi_rumah' => $request->kondisi_rumah
        ]);

        return redirect('/rt/kelola-nkk');
    }

    public function editNKK($id) {
        $kk = KartuKeluargaModel::find($id);

        return response()->json($kk);
    }

    public function updateNKK(NKKRequest $request, $id) {
        $request->validated();

        KartuKeluargaModel::where('kartu_keluarga_id', $id)->update([
            'no_kartu_keluarga' => $request->no_kartu_keluarga,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alamat_kk' => $request->alamat_kk,
            'jumlah_tanggungan' => $request->jumlah_tanggungan
        ]);

        UserModel::where('kartu_keluarga_id', $id)->where('nama_user', $request->nama_kepala_keluarga_lama)->update([
            'nama_user' => $request->nama_kepala_keluarga
        ]);

        return redirect('/rt/kelola-nkk');
    }

    public function deleteNKK($id) {
        KartuKeluargaModel::destroy($id);

        return redirect('/rt/kelola-nkk');
    }

    // Function download nkk excel
    public function downloadExcelNKK() {
        return Excel::download(new NKKExportExcel, 'rekap_data_nkk.xlsx');
    }
}
