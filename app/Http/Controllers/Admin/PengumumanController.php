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

    public function create(Request $request) {
        $validated = $request->validate([
            'judul_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
            'tanggal_pengumuman' => 'required',
            'jam_pengumuman' => 'required',
            'tempat_pengumuman' => 'required'
        ]);

        PengumumanModel::create($validated);

        return redirect('/admin/dashboard');
    }
}
