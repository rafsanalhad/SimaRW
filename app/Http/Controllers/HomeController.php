<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('layout.home.main');
    }
    public function login(){
        return view('layout.auth.login');
    }
    public function forgotPassword(){
        return view('layout.auth.forgot_password');
    }
    public function kodeVerif(){
        return view('layout.auth.input_kode_password');
    }
    public function newPassword(){
        return view('layout.auth.input_new_password');
    }
}
