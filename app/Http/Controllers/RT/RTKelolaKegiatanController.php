<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RTKelolaKegiatanController extends Controller
{
    public function kelolaKegiatan(){
        return view('layout.rt.kegiatan_warga');
    }
}
