<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUbahPasswordController extends Controller
{
    public function ubahPassword(){
        return view('layout.admin.ubah_password');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'password_baru' => 'required|min:8',
            'konfirmasi_password' => 'required|same:password_baru'
        ]);

        $user = Auth::user();

        if($user->is_first_login) {
            UserModel::where('user_id', $user->user_id)->update([
                'is_first_login' => false
            ]);
        } 

        UserModel::where('user_id', $user->user_id)->update([
            'password' => Hash::make($request->konfirmasi_password)
        ]);


        return redirect('/admin/ubah-password')->with('success', 'Password Anda berhasil diubah!');
    }
}
