<?php

namespace App\Exports;

use App\Models\RekomendasiBansosSPKVikorModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PenerimaBansosVikorExcel implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('exports.penerima_bansos_vikor', [
            'bansosVikor' => RekomendasiBansosSPKVikorModel::with('kartuKeluarga.user')->orderBy('rekomendasi_vikor_id', 'asc')->get()->map(function($user) {
                $users = $user->kartuKeluarga->user;
                $user->user_count = $users->count();
                $user->total_gaji = $users->sum('gaji_user');
                return $user;
            }),
            'noVikor' => 1
        ]);
    }
}

