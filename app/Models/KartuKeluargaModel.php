<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KartuKeluargaModel extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';

    protected $primaryKey = 'kartu_keluarga_id';

    protected $fillable = [
        'no_kartu_keluarga',
        'nama_kepala_keluarga',
        'alamat_kk',
        'jumlah_anggota_keluarga'
    ];

    public function user(): HasMany {
        return $this->hasMany(UserModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }

    public function pengajuanBansos(): HasMany {
        return $this->hasMany(PengajuanBansosModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }
}
