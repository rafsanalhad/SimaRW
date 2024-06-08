<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengumumanModel;
use Carbon\Carbon;

class WargaPengumumanController extends Controller
{
    public function show() {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $pengumuman = PengumumanModel::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        return response()->json($pengumuman);
    }
}
