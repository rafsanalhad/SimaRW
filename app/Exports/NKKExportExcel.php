<?php

namespace App\Exports;

use App\Models\KartuKeluargaModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NKKExportExcel implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('exports.nkk', [
            'dataKK' => KartuKeluargaModel::orderBy('kartu_keluarga_id', 'asc')->get(),
            'no' => 1
        ]);
    }
}

