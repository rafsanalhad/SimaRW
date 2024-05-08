<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailSuratModel extends Model
{
    use HasFactory;

    protected $table = 'detail_surat';

    protected $primaryKey = 'detail_surat_id';

    protected $fillable = [
        'surat_id',
        'tanggal_surat',
        'keterangan_surat',
        'tanda_tangan_rt',
        'tanda_tangan_rw'
    ];

    public function surat(): HasOne {
        return $this->hasOne(SuratModel::class, 'surat_id', 'surat_id');
    }
}
