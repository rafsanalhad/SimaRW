<?php

namespace App\Http\Controllers\RT;

use App\Exports\WargaExportExcel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\KartuKeluargaModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class KelolaWargaController extends Controller
{
    public function kelolaWarga(){
        // Untuk mengambil data warga yang memiliki role warga
        $warga = UserModel::with('kartuKeluarga')->where('role_id', 4)->orderBy('user_id')->get();
        $kk = KartuKeluargaModel::all();

        return view('layout.rt.kelola_warga', ['dataKK' => $kk, 'dataWarga' => $warga, 'no' => 1]);
    }

    public function createWarga(UserRequest $request) {
        $request->validated();
        // dd($request->validated());

        $foto_user = Storage::disk('public')->put('User-Images', $request->file('foto_user'));

        $userSave = UserModel::create([
            'kartu_keluarga_id' => $request->kartu_keluarga_id,
            'role_id' => $request->role_id,
            'nama_user' => $request->nama_user,
            'nik_user' => $request->nik_user,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'status_kawin' => $request->status_kawin,
            'pekerjaan_user' => $request->pekerjaan_user,
            'alamat_user' => $request->alamat_user,
            'nomor_rt' => $request->nomor_rt,
            'nomor_rw' => $request->nomor_rw,
            'email_user' => $request->email_user,
            'gaji_user' => $request->gaji_user,
            'password' => Hash::make($request->nik_user),
            'foto_user' => $foto_user
        ]);

        if($userSave) {
            return redirect('/rt/kelola-warga')->with('success', 'Data Warga Berhasil Ditambahkan!');
        } else {
            return redirect('/rt/kelola-warga')->with('error', 'Data Warga Gagal Ditambahkan!');
        }
    }

    // Function mengambil data warga dari database
    public function editWarga($id) {
        // Untuk mengambil data warga berdasarkan id
        $warga = UserModel::with('kartuKeluarga')->find($id);

        return response()->json($warga);
    }

    // Function update data warga
    public function updateWarga(UserRequest $request, $id) {
        $validated = $request->validated();

        if($request->file('foto_user')) {
            $foto_user = basename(UserModel::find($id)->foto_user);
            Storage::disk('public')->delete('User-Images/' . $foto_user);

            $foto_user = Storage::disk('public')->put('User-Images', $request->file('foto_user'));
            $validated['foto_user'] = $foto_user;
        }

        if(KartuKeluargaModel::where('nama_kepala_keluarga', $request->nama_kepala_keluarga)->where('kartu_keluarga_id', $request->kartu_keluarga_id)->first()->nama_kepala_keluarga == $request->nama_user_lama) {
            KartuKeluargaModel::where('kartu_keluarga_id', $request->kartu_keluarga_id)->update([
                'nama_kepala_keluarga' => $request->nama_user
            ]);
        }

        $userSave = UserModel::where('user_id', $id)->update($validated);

        if($userSave) {
            return redirect('/rt/kelola-warga')->with('success', 'Data Warga Berhasil Diedit!');
        } else {
            return redirect('/rt/kelola-warga')->with('error', 'Data Warga Gagal Diedit!');
        }
    }

    // Function Cek Apakah Warga Merupakan Kepala Keluarga
    public function cekKepalaKeluarga($id) {
        if(KartuKeluargaModel::where('nama_kepala_keluarga', UserModel::find($id)->nama_user)->count() == 0) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

    // Function delete warga
    public function deleteWarga($id) {
        $foto_user = basename(UserModel::find($id)->foto_user);

        Storage::disk('public')->delete('User-Images/' . $foto_user);

        $userSave = UserModel::destroy($id);

        if($userSave) {
            return redirect('/rt/kelola-warga')->with('success', 'Data Warga Berhasil Dihapus!');
        } else {
            return redirect('/rt/kelola-warga')->with('error', 'Data Warga Gagal Dihapus!');
        }
    }

    // Function download excel
    public function downloadExcelWarga() {
        return Excel::download(new WargaExportExcel, 'rekap_data_warga.xlsx');
    }
}
