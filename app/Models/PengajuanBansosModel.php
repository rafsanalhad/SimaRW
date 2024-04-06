<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBansosModel extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_bansos';

    protected $primaryKey = 'pengajuan_id';

    protected $fillable = [
        'kartu_keluarga_id',
        'tanggal_pengajuan',
        'bukti_pengajuan',
        'status_verif'
    ];
}
