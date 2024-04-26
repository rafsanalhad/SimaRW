<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\KartuKeluargaModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.admin.dashboard');
    }
    public function kelolaWarga(){
        // Untuk mengambil data warga yang memiliki role warga
        $warga = UserModel::with('kartuKeluarga')->where('role_id', 4)->orderBy('user_id')->get();
        $kk = KartuKeluargaModel::all();

        return view('layout.admin.kelola_warga', ['dataKK' => $kk, 'dataWarga' => $warga, 'no' => 1]);
    }

    // Membuat function tambah data warga
    public function createWarga(UserRequest $request) {
        $request->validated();
        // dd($validated);

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
            'password_user' => Hash::make($request->nik_user)
        ]);

        return redirect('/admin/kelola-warga');
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

        UserModel::where('user_id', $id)->update($validated);

        return redirect('/admin/kelola-warga');
    }

    // Function delete warga
    public function deleteWarga($id) {
        UserModel::destroy($id);
        return redirect('/admin/kelola-warga');
    }

    // Function menampilkan data RT
    public function kelolaRt(){
        // Untuk mengambil data RT yang memiliki role RT
        $rt = UserModel::with('kartuKeluarga')->where('role_id', 2)->orderBy('user_id')->get();

        return view('layout.admin.kelola_rt', ['dataRT' => $rt, 'no' => 1]);
    }

    // Function menampilkan data RW
    public function kelolaRw(){
        // Untuk mengambil data RW yang memiliki role RW
        $rw = UserModel::with('kartuKeluarga')->where('role_id', 3)->orderBy('user_id')->get();

        return view('layout.admin.kelola_rw', ['dataRW' => $rw, 'no' => 1]);
    }
    public function kelolaUmkm(){
        return view('layout.admin.kelola_umkm');
    }
    public function kelolaBansos(){
        return view('layout.admin.kelola_bansos');
    }
    public function laporanPengaduan(){
        return view('layout.admin.laporan_pengaduan');
    }
    public function historyPengaduan(){
        return view('layout.admin.history_pengaduan');
    }
}
