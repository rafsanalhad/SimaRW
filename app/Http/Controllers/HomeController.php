<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('layout.home.main');
    }
    public function login(){
        if(Auth::check()) {
            $user = Auth::user();

            if($user->role_id == 1) {
                return redirect()->intended('/admin/dashboard');
            } else if($user->role_id == 2) {
                return redirect()->intended('/rtrw/dashboard');
            } else if($user->role_id == 3) {
                return redirect()->intended('/rtrw/dashboard');
            } else if($user->role_id == 4) {
                return redirect()->intended('/warga/dashboard');
            }
        }

        return view('layout.auth.login');
    }
    public function forgotPassword(){
        return view('layout.auth.forgot_password');
    }
}
