<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'nik_user' => 'required|string|max:16',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $user = Auth::user();

            if($user->role_id == 1) {
                if($user->is_first_login) {
                    return redirect('/admin/ubah-password');
                } else {
                    return redirect()->intended('/admin/dashboard');
                }
            } else if($user->role_id == 2) {
                if($user->is_first_login) {
                    return redirect('/rt/ubah-password');
                } else {
                    return redirect()->intended('/rt/dashboard');
                }
            } else if($user->role_id == 3) {
                if($user->is_first_login) {
                    return redirect('/rw/ubah-password');
                } else {
                    return redirect()->intended('/rw/dashboard');
                }
            } else if($user->role_id == 4) {
                if($user->is_first_login) {
                    return redirect('/warga/ubah-password');
                } else {
                    return redirect()->intended('/warga/dashboard');
                }
            }

            return redirect('/login');
        }

        return back()->with('loginError', 'NIK atau Password salah!');
    }
}
