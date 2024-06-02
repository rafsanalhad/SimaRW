<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MigrasiIuran extends Model
{
    use HasFactory;

    protected $table = 'migrasi_iuran';

    protected $primaryKey = 'migrasi_iuran_id';

    protected $fillable = [
        'nama_pelapor',
        'jabatan_pelapor',
        'nomor_rt',
        'nomor_rw',
        'jumlah_pengeluaran',
        'bukti_struk',
        'keterangan_pengeluaran',
        'tanggal_migrasi',
        'dana_keluar',
        'dana_masuk',
        'sisa_saldo'
    ];
}
