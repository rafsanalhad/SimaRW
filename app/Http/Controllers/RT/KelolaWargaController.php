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

        UserModel::create([
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
            'email_user' => $request->email_user,
            'gaji_user' => $request->gaji_user,
            'password' => Hash::make($request->nik_user),
            'foto_user' => $foto_user
        ]);

        return redirect('/rt/kelola-warga');
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

        UserModel::where('user_id', $id)->update($validated);

        return redirect('/rt/kelola-warga');
    }

    // Function delete warga
    public function deleteWarga($id) {
        $foto_user = basename(UserModel::find($id)->foto_user);

        Storage::disk('public')->delete('User-Images/' . $foto_user);

        UserModel::destroy($id);
        return redirect('/rt/kelola-warga');
    }

    // Function download excel
    public function downloadExcelWarga() {
        return Excel::download(new WargaExportExcel, 'rekap_data_warga.xlsx');
    }
}
