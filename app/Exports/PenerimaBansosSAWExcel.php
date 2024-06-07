<?php

namespace App\Exports;

use App\Models\RekomendasiBansosModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PenerimaBansosSAWExcel implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('exports.penerima_bansos_saw', [
            'bansosSAW' => RekomendasiBansosModel::with('kartuKeluarga.user')->orderBy('rekomendasi_bansos_id', 'asc')->get()->map(function($user) {
                $users = $user->kartuKeluarga->user;
                $user->user_count = $users->count();
                $user->total_gaji = $users->sum('gaji_user');
                return $user;
            }),
            'noSAW' => 1
        ]);
    }
}

