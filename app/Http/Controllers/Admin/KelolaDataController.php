<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\RTRequest;
use App\Http\Requests\RwRequest;
use App\Http\Requests\NKKRequest;
use App\Http\Requests\UserRequest;
use App\Models\KartuKeluargaModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KelolaDataController extends Controller
{
    public function kelolaWarga(){
        // Untuk mengambil data warga yang memiliki role warga
        $warga = UserModel::with('kartuKeluarga')->where('role_id', 4)->orderBy('user_id')->get();
        $kk = KartuKeluargaModel::all();

        return view('layout.admin.kelola_warga', ['dataKK' => $kk, 'dataWarga' => $warga, 'no' => 1]);
    }

    // Membuat function tambah data warga
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

        if($request->file('foto_user')) {
            $foto_user = basename(UserModel::find($id)->foto_user);
            Storage::disk('public')->delete('User-Images/' . $foto_user);

            $foto_user = Storage::disk('public')->put('User-Images', $request->file('foto_user'));
            $validated['foto_user'] = $foto_user;
        }

        UserModel::where('user_id', $id)->update($validated);

        return redirect('/admin/kelola-warga');
    }

    // Function delete warga
    public function deleteWarga($id) {
        $foto_user = basename(UserModel::find($id)->foto_user);

        Storage::disk('public')->delete('User-Images/' . $foto_user);

        UserModel::destroy($id);
        return redirect('/admin/kelola-warga');
    }

    // Function menampilkan data RT
    public function kelolaRt(){
        // Untuk mengambil data RT yang memiliki role RT
        $warga = UserModel::all()->whereIn('role_id', [2, 3, 4]);
        $rt = UserModel::with('kartuKeluarga')->where('role_id', 2)->orderBy('user_id')->get();
        $rw = UserModel::where('role_id', 3)->get();

        return view('layout.admin.kelola_rt', ['dataWarga' => $warga ,'dataRT' => $rt, 'dataRW' => $rw,'no' => 1]);
    }

    // Function create rt
    public function createRt(RTRequest $request) {
        $request->validated();

        UserModel::where('user_id', $request->rt_baru)->update([
            'role_id' => $request->role_id,
            'masa_jabatan_awal' => $request->masa_jabatan_awal,
            'masa_jabatan_akhir' => $request->masa_jabatan_akhir,
            'nomor_rw' => $request->nomor_rw,
            'nomor_rt' => $request->nomor_rt
        ]);

        return redirect('/admin/kelola-rt');
    }

    // function menampilkan data untuk edit RT
    public function editRt($id) {
        $rt = UserModel::with('kartuKeluarga')->find($id);

        return response()->json($rt);
    }

    // Function update data RT
    public function updateRt(RTRequest $request) {
        $request->validated();

        $rt_lama = $request->rt_lama;

        if(UserModel::where('user_id', $rt_lama)->get('user_id') == $rt_lama) {
            UserModel::where('user_id', $rt_lama)->update([
                'nomor_rw' => $request->nomor_rw,
                'nomor_rt' => $request->nomor_rt,
                'masa_jabatan_awal' => $request->masa_jabatan_awal,
                'masa_jabatan_akhir' => $request->masa_jabatan_akhir
            ]);
        } else {
            UserModel::where('user_id', $rt_lama)->update([
                'role_id' => 4,
                'nomor_rt' => null,
                'nomor_rw' => null,
                'masa_jabatan_awal' => null,
                'masa_jabatan_akhir' => null
            ]);

            UserModel::where('user_id', $request->rt_baru)->update([
                'role_id' => 2,
                'nomor_rt' => $request->nomor_rt,
                'nomor_rw' => $request->nomor_rw,
                'masa_jabatan_awal' => $request->masa_jabatan_awal,
                'masa_jabatan_akhir' => $request->masa_jabatan_akhir
            ]);
        }

        return redirect('/admin/kelola-rt');
    }

    // Function delete data RT
    public function deleteRt($id) {
        UserModel::find($id)->update([
            'role_id' => 4,
            'nomor_rw' => null,
            'nomor_rt' => null,
            'masa_jabatan_awal' => null,
            'masa_jabatan_akhir' => null
        ]);

        return redirect('/admin/kelola-rt');
    }

    // Function menampilkan data RW
    public function kelolaRw(){
        // Untuk mengambil data RW yang memiliki role RW
        $rw = UserModel::with('rt')->where('role_id', 3)->orderBy('user_id')->get();
        $warga = UserModel::all()->whereIn('role_id', [2, 3, 4]);

        return view('layout.admin.kelola_rw', ['dataRW' => $rw, 'no' => 1, 'wargas' => $warga]);
    }

    public function createRw(RwRequest $request) {
        $request->validated();

        UserModel::where('user_id', $request->rw_baru)->update([
            'role_id' => 3,
            'nomor_rw' => $request->nomor_rw,
            'masa_jabatan_awal' => $request->masa_jabatan_awal,
            'masa_jabatan_akhir' => $request->masa_jabatan_akhir
        ]);

        return redirect('/admin/kelola-rw');
    }

    public function editRw($id) {
        $rw = UserModel::find($id);

        return response()->json($rw);
    }

    public function updateRw(RwRequest $request) {
        $request->validated();

        $rw_lama = $request->rw_lama;

        if(UserModel::where('user_id', $rw_lama)->get('user_id') == $rw_lama) {
            UserModel::where('user_id', $rw_lama)->update([
                'nomor_rw' => $request->nomor_rw,
                'masa_jabatan_awal' => $request->masa_jabatan_awal,
                'masa_jabatan_akhir' => $request->masa_jabatan_akhir
            ]);
        } else {
            UserModel::where('user_id', $rw_lama)->update([
                'role_id' => 4,
                'nomor_rw' => null,
                'masa_jabatan_awal' => null,
                'masa_jabatan_akhir' => null
            ]);

            UserModel::where('user_id', $request->rw_baru)->update([
                'role_id' => 3,
                'nomor_rw' => $request->nomor_rw,
                'masa_jabatan_awal' => $request->masa_jabatan_awal,
                'masa_jabatan_akhir' => $request->masa_jabatan_akhir
            ]);
        }



        return redirect('/admin/kelola-rw');
    }

    public function deleteRw($id) {
        UserModel::find($id)->update([
            'role_id' => 4,
            'nomor_rw' => null,
            'masa_jabatan_awal' => null,
            'masa_jabatan_akhir' => null
        ]);

        return redirect('/admin/kelola-rw');
    }

    public function showKK(){
        $kk = KartuKeluargaModel::withCount('user')->get();

        return view('layout.admin.kelola_nkk', ['dataKK' => $kk, 'no' => 1]);
    }

    public function createNKK(NKKRequest $request) {
        $request->validated;
        // dd($debug);

        KartuKeluargaModel::create([
            'no_kartu_keluarga' => $request->no_kartu_keluarga,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'alamat_kk' => $request->alamat_kk,
            'jumlah_tanggungan' => $request->jumlah_tanggungan
        ]);

        return redirect('/admin/kelola-nkk');
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

        return redirect('/admin/kelola-nkk');
    }

    public function deleteNKK($id) {
        KartuKeluargaModel::destroy($id);

        return redirect('/admin/kelola-nkk');
    }
}
