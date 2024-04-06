<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanWargaModel extends Model
{
    use HasFactory;

    protected $table = 'pengaduan_warga';

    protected $primaryKey = 'pengaduan_id';

    protected $fillable = [
        'user_id',
        'tanggal_pengaduan',
        'isi_pengaduan',
        'status_pengaduan',
    ];
}
