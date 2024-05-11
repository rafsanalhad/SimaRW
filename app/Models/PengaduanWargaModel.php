<?php

namespace App\Models;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'nomor_rt',
        'nomor_rw'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
