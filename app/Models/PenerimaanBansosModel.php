<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanBansosModel extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_bansos';

    protected $primaryKey = 'penerimaan_id';

    protected $fillable = [
        'pengajuan_id',
        'tanggal_penerimaan',
        'bukti_penerimaan'
    ];
}
