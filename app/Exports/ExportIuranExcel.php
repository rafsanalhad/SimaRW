<?php

namespace App\Exports;

use App\Models\IuranModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportIuranExcel implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('exports.iuran', [
            'dataIuran' => IuranModel::with('kartuKeluarga')->get()
        ]);
    }
}
