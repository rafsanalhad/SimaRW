<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanBansosModel extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_bansos';

    protected $primaryKey = 'pengajuan_id';

    protected $fillable = [
        'kartu_keluarga_id',
        'pendapatan_keluarga',
        'tanggungan_warga',
        'nomor_rt',
        'nomor_rw',
        'alasan_warga',
        'tanggal_pengajuan',
        'file_sktm',
        'status_verif'
    ];

    public function kartuKeluarga(): BelongsTo {
        return $this->belongsTo(KartuKeluargaModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }
}
