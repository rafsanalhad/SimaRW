<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class TemplateSuratWarga extends Controller
{
    public function index(){
        return view('layout.warga.template_surat');
    
    }
    public function downloadSuratKk(){
        $pdf = Pdf::loadView('layout.surat.suratkk');
        return $pdf->download('suratkk.pdf');
        // return view('layout.surat.suratkk');
    }
    
}
