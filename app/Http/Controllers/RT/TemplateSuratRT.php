<?php

namespace App\Http\Controllers\RT;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class TemplateSuratRT extends Controller
{
    public function index(){
        return view('layout.rt.template_surat');
    
    }
    public function downloadSuratKk(){
        $pdf = Pdf::loadView('layout.surat.suratkk');
        return $pdf->download('suratkk.pdf');
        // return view('layout.surat.suratkk');
    }
    
}
