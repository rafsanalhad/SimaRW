<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMailer;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // Menampilkan halaman forgot password
    public function index() {
        return view('layout.auth.forgot_password');
    }

    // Melakukan generate code dan sending email menuju user
    public function sendEmail(Request $request) {
        $kodeVerif = rand(222222, 999999);

        // Menyimpan kode verif pada session
        $request->session()->put('kodeVerifLama', $kodeVerif);

        $toEmail = $request->email_user;

        // Menyimpan email user pada session untuk dilakukan pencarian akun
        $request->session()->put('emailUser', $toEmail);

        $subject = 'Kode Verifikasi Reset Password SIMARW';
        $message = $kodeVerif;

        $testing = Mail::to($toEmail)->send(new ForgotPasswordMailer($message, $subject));

        return redirect()->route('pageCekKode');
    }

    public function pageKodeVerif() {
        return view('layout.auth.input_kode_password');
    }

    public function cekKodeVerif(Request $request) {
        $kodeVerif = $request->session()->get('kodeVerifLama');

        if($request->kode_verif == $kodeVerif) {
            return redirect('/new-password');
        } else {
            return redirect()->route('pageCekKode');
        }
    }

    public function pageNewPass() {
        return view('layout.auth.input_new_password');
    }

    public function newPassword(Request $request) {
        $emailUser = $request->session()->get('emailUser');

        if($request->password_awal == $request->password_akhir) {
            UserModel::where('email_user', $emailUser)->update(['password' => Hash::make($request->password_akhir)]);

            // Menghapus session kodeverif dan emailuser
            $request->session()->forget('kodeVerif');
            $request->session()->forget('emailUser');

            return redirect('/login');
        } else {
            return redirect('/new-password');
        }
    }
}
