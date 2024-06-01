<?php

namespace App\Http\Controllers\Warga;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WargaUbahPasswordController extends Controller
{
    public function ubahPassword(){
        return view('layout.warga.ubah_password');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'password_baru' => 'required|min:8',
            'konfirmasi_password' => 'required|same:password_baru'
        ]);

        $user = Auth::user();

        UserModel::where('user_id', $user->user_id)->update([
            'password' => Hash::make($request->konfirmasi_password)
        ]);

        return redirect('/warga/ubah-password')->with('success', 'Password Anda berhasil diubah!');
    }
}
