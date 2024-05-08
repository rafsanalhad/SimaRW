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
                return redirect()->intended('/admin/dashboard');
            } else if($user->role_id == 2) {
                return redirect()->intended('/rt/dashboard');
            } else if($user->role_id == 3) {
                return redirect()->intended('/rw/dashboard');
            } else if($user->role_id == 4) {
                return redirect()->intended('/warga/dashboard');
            }

            return redirect('/login');
        }

        return back()->with('loginError', 'NIK atau Password salah!');
    }
}
