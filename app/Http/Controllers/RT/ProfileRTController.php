<?php

namespace App\Http\Controllers\RT;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileRTController extends Controller
{
    public function profileRt() {
        $profil = UserModel::where('user_id', Auth::user()->user_id)->with('kartuKeluarga')->first();

        return view('layout.rt.profil_rt', ['profil' => $profil]);
    }
}
