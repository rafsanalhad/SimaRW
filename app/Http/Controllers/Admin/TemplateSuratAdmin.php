<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class TemplateSuratAdmin extends Controller
{
    public function index(){
        return view('layout.admin.template_surat');
    
    }
    public function downloadSuratKk(){
        $pdf = Pdf::loadView('layout.surat.suratkk');
        return $pdf->download('suratkk.pdf');
        // return view('layout.surat.suratkk');
    }
    
}
