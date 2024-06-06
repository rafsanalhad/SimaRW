<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RekomendasiBansosModel extends Model
{
    use HasFactory;

    protected $table = 'rekomendasi_bansos';

    protected $primaryKey = 'rekomendasi_bansos_id';

    protected $fillable = [
        'kartu_keluarga_id',
        'usia',
        'kondisi_rumah',
        'pekerjaan',
        'jumlah_tanggungan',
        'total_gaji',
        'total_pembobotan',
        'status'
    ];

    public function kartuKeluarga(): HasOne {
        return $this->hasOne(KartuKeluargaModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }
}
