<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RekomendasiBansosSPKVikorModel extends Model
{
    use HasFactory;

    protected $table = 'rekomendasi_bansos_vikor';

    protected $primaryKey = 'rekomendasi_vikor_id';

    protected $fillable = [
        'kartu_keluarga_id',
        'hasil_indeks',
        'status'
    ];

    public function kartuKeluarga() : HasOne {
        return $this->hasOne(KartuKeluargaModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }
}
