<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\UmkmModel;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function index(){
        $umkm = UmkmModel::all();

        return view('layout.warga.umkm', ['umkm' => $umkm]);
    }
}
