<?php

namespace App\Observers;

use App\Models\IuranModel;
use App\Models\MigrasiIuran;

class UpdateSisaSaldoIuran
{
    /**
     * Handle the IuranModel "created" event.
     */
    public function created(IuranModel $iuranModel): void
    {
        //
    }

    /**
     * Handle the IuranModel "updated" event.
     */
    public function updated(IuranModel $iuranModel): void
    {
        // Ambil Entri Terakhir dari Migrasi Iuran
        $lastMigrasi = MigrasiIuran::orderBy('migrasi_iuran_id', 'desc')->first();

        MigrasiIuran::create([
            'tanggal_migrasi' => now(),
            'dana_keluar' => null,
            'dana_masuk' => 30000,
            'sisa_saldo' => $lastMigrasi->sisa_saldo + 30000,
        ]);
    }

    /**
     * Handle the IuranModel "deleted" event.
     */
    public function deleted(IuranModel $iuranModel): void
    {
        //
    }

    /**
     * Handle the IuranModel "restored" event.
     */
    public function restored(IuranModel $iuranModel): void
    {
        //
    }

    /**
     * Handle the IuranModel "force deleted" event.
     */
    public function forceDeleted(IuranModel $iuranModel): void
    {
        //
    }
}
