<?php

namespace App\Exports;

use App\Models\UserModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WargaExportExcel implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('exports.warga', [
            'dataWarga' => UserModel::where('role_id', 4)->orderBy('user_id', 'asc')->get(),
            'no' => 1
        ]);
    }
}
