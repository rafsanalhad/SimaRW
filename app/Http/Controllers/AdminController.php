<?php

namespace App\Http\Controllers;

use App\Http\Requests\RTRequest;
use App\Http\Requests\RwRequest;
use App\Http\Requests\UserRequest;
use App\Models\KartuKeluargaModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.admin.dashboard');
    }

    public function kelolaBansos(){
        return view('layout.admin.kelola_bansos');
    }
    public function kelolaIuran(){
        return view('layout.admin.kelola_iuran');
    }
    public function laporanIuran(){
        return view('layout.admin.laporan_iuran');
    }
    public function kelolaSurat(){
        return view('layout.admin.kelola_surat');
    }
    public function profilAdmin(){
        return view('layout.admin.profil_admin');
    }
}
