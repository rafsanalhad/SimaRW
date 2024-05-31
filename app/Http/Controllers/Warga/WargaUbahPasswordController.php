<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WargaUbahPasswordController extends Controller
{
    public function ubahPassword(){
        return view('layout.warga.ubah_password');
    }
}
