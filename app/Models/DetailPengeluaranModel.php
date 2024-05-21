<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailPengeluaranModel extends Model
{
    use HasFactory;
    protected $table = 'detail_pengeluaran';

    protected $primaryKey = 'detail_pengeluaran_id';

    protected $fillable = [
        'user_id',
        'jumlah_pengeluaran',
        'bukti_pengeluaran',
        'detail_pengeluaran'
    ];

    public function user(): HasOne {
        return $this->hasOne(UserModel::class, 'user_id', 'user_id');
    }
}
