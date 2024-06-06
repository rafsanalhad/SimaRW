<?php

namespace App\Http\Controllers;

use App\Models\KegiatanWargaModel;
use App\Models\UmkmModel;
use App\Services\TwilioService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Unsplash\Search;

class HomeController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function index(){
        $umkm = UmkmModel::all()->map(function($jam) {
            $jam->jam_operasional_awal = Carbon::parse($jam->jam_operasional_awal)->format('H:i');
            $jam->jam_operasional_akhir = Carbon::parse($jam->jam_operasional_akhir)->format('H:i');

            return $jam;
        });

        $kegiatanWarga = KegiatanWargaModel::all()->map(function ($item) {
            Carbon::setLocale('id');
            $item->jadwal_kegiatan = Carbon::parse($item->jadwal_kegiatan)->isoFormat('dddd');
            $item->jam_awal = Carbon::parse($item->jam_awal)->format('H:i');
            $item->jam_akhir = Carbon::parse($item->jam_akhir)->format('H:i');

            return $item;
        });

        return view('layout.home.main', ['umkm' => $umkm, 'kegiatanWarga' => $kegiatanWarga]);
    }

    public function pengaduan(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'subjek' => 'required|string',
            'pesan' => 'required|string',
        ]);

        $tanggal = Carbon::now();

        $message = "Nama : *$request->nama*\n\nSubjek : *$request->subjek*\n\nTanggal Pengaduan : $tanggal\n\nPengaduan : $request->pesan";

        $this->twilio->sendWhatsAppMessage($message);

        return redirect('/');
    }

    public function login(){
        if(Auth::check()) {
            $user = Auth::user();

            if($user->role_id == 1) {
                return redirect()->intended('/admin/dashboard');
            } else if($user->role_id == 2) {
                return redirect()->intended('/rt/dashboard');
            } else if($user->role_id == 3) {
                return redirect()->intended('/rw/dashboard');
            } else if($user->role_id == 4) {
                return redirect()->intended('/warga/dashboard');
            }
        }

        return view('layout.auth.login');
    }
    public function forgotPassword(){
        return view('layout.auth.forgot_password');
    }
}
