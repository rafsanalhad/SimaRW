<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengumumanModel;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function show() {
        $pengumuman = PengumumanModel::all();

        return response()->json($pengumuman);
    }

    public function create() {

    }
}
