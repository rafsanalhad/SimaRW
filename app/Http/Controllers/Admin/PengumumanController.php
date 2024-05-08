<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PengumumanController extends Controller
{
    public function show() {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $pengumuman = PengumumanModel::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

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
