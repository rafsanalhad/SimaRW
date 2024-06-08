<?php

namespace App\Http\Controllers\Admin;

use App\Models\KartuKeluargaModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilAdminController extends Controller
{
    public function profilAdmin(){
        $profil = UserModel::where('user_id', Auth::user()->user_id)->with('kartuKeluarga')->first();


        return view('layout.admin.profil_admin', ['profil' => $profil]);
    }

    public function updateProfil(Request $request) {
        $request->validate([
            'nama_user' => 'required',
            'email_user' => 'required',
            'foto_user' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);


        if(KartuKeluargaModel::where('nama_kepala_keluarga', Auth::user()->nama_user)->first()->nama_kepala_keluarga == Auth::user()->nama_user) {
            KartuKeluargaModel::where('nama_kepala_keluarga', Auth::user()->nama_user)->update([
                'nama_kepala_keluarga' => $request->nama_user,
            ]);
        }

        if($request->file('foto_user')) {
            Storage::disk('public')->delete(Auth::user()->foto_user);

            $file = Storage::disk('public')->put('User-Images', $request->file('foto_user'));

            UserModel::find(Auth::user()->user_id)->update([
                'nama_user' => $request->nama_user,
                'email_user' => $request->email_user,
                'foto_user' => $file,
            ]);
        } else {
            UserModel::find(Auth::user()->user_id)->update([
                'nama_user' => $request->nama_user,
                'email_user' => $request->email_user,
            ]);
        }

        return redirect('/admin/profil-admin');
    }
}
