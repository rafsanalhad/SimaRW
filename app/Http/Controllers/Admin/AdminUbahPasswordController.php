<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUbahPasswordController extends Controller
{
    public function ubahPassword(){
        return view('layout.admin.ubah_password');
    }
}
