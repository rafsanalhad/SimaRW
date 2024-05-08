<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanModel extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $primaryKey = 'pengumuman_id';

    protected $fillable = [
        'judul_pengumuman',
        'isi_pengumuman',
        'tanggal_pengumuman',
        'jam_pengumuman',
        'tempat_pengumuman'
    ];
}
