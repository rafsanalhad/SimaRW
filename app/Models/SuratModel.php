<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SuratModel extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $primaryKey = 'surat_id';

    protected $fillable = [
        'user_id',
        'jenis_surat',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    public function detail(): HasOne {
        return $this->hasOne(DetailSuratModel::class, 'surat_id', 'surat_id');
    }
}
