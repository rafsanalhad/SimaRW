<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.admin.dashboard');
    }
    public function kelolaWarga(){
        return view('layout.admin.kelola_warga');
    }
}
