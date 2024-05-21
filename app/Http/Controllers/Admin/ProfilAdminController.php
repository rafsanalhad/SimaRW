<?php

namespace App\Http\Controllers\Admin;

use App\Models\KartuKeluargaModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilAdminController extends Controller
{
    public function profilAdmin(){
        $profil = UserModel::where('user_id', Auth::user()->user_id)->with('kartuKeluarga')->first();


        return view('layout.admin.profil_admin', ['profil' => $profil]);
    }
}
