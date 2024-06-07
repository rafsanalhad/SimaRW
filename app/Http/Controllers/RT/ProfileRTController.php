<?php

namespace App\Http\Controllers\RT;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class ProfileRTController extends Controller
{
    public function profileRt() {
        $profil = UserModel::where('user_id', Auth::user()->user_id)->with('kartuKeluarga')->first();

        return view('layout.rt.profil_rt', ['profil' => $profil]);
    }

    public function updateProfil(Request $request) {
        $request->validate([
            'foto_user' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        if($request->file('foto_user')) {
            Storage::disk('public')->delete(Auth::user()->foto_user);

            $file = Storage::disk('public')->put('User-Images', $request->file('foto_user'));

            UserModel::find(Auth::user()->user_id)->update([
                'foto_user' => $file,
            ]);
        }

        return redirect('/rt/profil-rt');
    }
}
