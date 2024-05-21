<?php

namespace App\Http\Controllers\Warga;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilWargaController extends Controller
{
    public function profilWarga(){
        $profil = UserModel::where('user_id', Auth::user()->user_id)->with('kartuKeluarga')->first();

        return view('layout.warga.profil_warga', ['profil' => $profil]);
    }
}
