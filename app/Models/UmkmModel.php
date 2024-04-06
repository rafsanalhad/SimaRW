<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'gambar_umkm'
    ];
}
