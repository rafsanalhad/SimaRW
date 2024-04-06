<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiUmkmModel extends Model
{
    use HasFactory;

    protected $table = 'detail_lokasi_umkm';

    protected $primaryKey = 'detail_lokasi_id';

    protected $fillable = [
        'umkm_id',
        'latitude_umkm',
        'longitude_umkm'
    ];
}
