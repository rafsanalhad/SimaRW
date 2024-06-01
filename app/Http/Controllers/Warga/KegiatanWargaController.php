<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\KegiatanWargaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanWargaController extends Controller
{
    public function index() {
        Carbon::setLocale('id');
        $kegiatan = KegiatanWargaModel::all()->map(function ($k) {
            $k->hari_kegiatan = Carbon::parse($k->jadwal_kegiatan)->isoFormat('dddd');
            $k->jam_awal = Carbon::parse($k->jam_awal)->format('H:i');
            $k->jam_akhir = Carbon::parse($k->jam_akhir)->format('H:i');

            return $k;
        });

        return view('layout.warga.kegiatan_warga', ['kegiatan' => $kegiatan]);
    }

}
