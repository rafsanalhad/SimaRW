<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileRWController extends Controller
{
    public function profileRw() {
        $profil = UserModel::where('user_id', Auth::user()->user_id)->with('kartuKeluarga')->first();

        return view('layout.rw.profil_rw', ['profil' => $profil]);
    }
}
