<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UmkmModel extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $primaryKey = 'umkm_id';

    protected $fillable = [
        'user_id',
        'nama_umkm',
        'alamat_umkm',
        'kontak_umkm',
        'deskripsi_umkm',
        'jam_operasional_awal',
        'jam_operasional_akhir',
        'gambar_umkm'
    ];

    public function user(): HasOne {
        return $this->hasOne(UserModel::class, 'user_id', 'user_id');
    }

    public function lokasi(): HasOne {
        return $this->hasOne(LokasiUmkmModel::class, 'umkm_id', 'umkm_id');
    }
}
