<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RTUbahPasswordController extends Controller
{
    public function ubahPassword(){
        return view('layout.rt.ubah_password');
    }
}
