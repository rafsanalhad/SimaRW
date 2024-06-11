<?php

namespace App\Http\Controllers\Warga;

use App\Models\KartuKeluargaModel;
use App\Models\UserModel;
use App\Models\IuranModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Midtrans\Transaction;

class IuranController extends Controller
{
    public function index() {
        $warga = UserModel::where('user_id', Auth::user()->user_id)->first();

        $iuran = IuranModel::where('kartu_keluarga_id', $warga->kartu_keluarga_id)->with('kartuKeluarga')->orderBy('iuran_id', 'desc')->get();
        $iuranBelumLunas = IuranModel::where('kartu_keluarga_id', $warga->kartu_keluarga_id)->where('status', 'Belum Lunas')->get();

        return view('layout.warga.bayar_iuran', ['iuran' => $iuran, 'no' => 1, 'iuranBelumLunas' => $iuranBelumLunas]);
    }

    public function bayarIuran($id) {
        $iuran = IuranModel::where('iuran_id', $id)->first();
        if ($iuran) {
            $iuran->tanggal_bayar = Carbon::now();
            $iuran->status = 'Lunas';
            $iuran->jumlah_iuran = 30000;
            $iuran->save();
        }

        return redirect('/warga/bayar-iuran');
    }

    public function iuranCreateMonthly() {

        $kartuKeluarga = KartuKeluargaModel::all();

        foreach($kartuKeluarga as $kk) {
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => 30000,
                )
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            IuranModel::create([
                'kartu_keluarga_id' => $kk->kartu_keluarga_id,
                'tanggal_iuran' => Carbon::now(),
                'snap_token' => $snapToken,
                'status' => 'Belum Lunas'
            ]);
        }
    }
}
