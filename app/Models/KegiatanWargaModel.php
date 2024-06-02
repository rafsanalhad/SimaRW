<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanWargaModel extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_warga';

    protected $primaryKey = 'kegiatan_id';

    protected $fillable = [
        'nama_kegiatan',
        'tempat_kegiatan',
        'jadwal_kegiatan',
        'deskripsi_kegiatan',
        'jam_awal',
        'jam_akhir',
        'foto_kegiatan'
    ];
}
