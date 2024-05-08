<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IuranModel extends Model
{
    use HasFactory;

    protected $table = 'iuran';

    protected $primaryKey = 'iuran_id';

    protected $fillable = [
        'kartu_keluarga_id',
        'tanggal_iuran',
        'bukti_iuran',
        'status'
    ];

    public function kartuKeluarga(): BelongsTo {
        return $this->belongsTo(KartuKeluargaModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }
}
