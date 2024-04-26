<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'kartu_keluarga_id',
        'role_id',
        'nik_user',
        'tempat',
        'tanggal_lahir',
        'gender',
        'agama',
        'status_kawin',
        'nama_user',
        'email_user',
        'password_user',
        'gaji_user',
        'pekerjaan_user',
        'alamat_user'
    ];

    public function role(): HasMany {
        return $this->hasMany(RoleModel::class, 'role_id', 'role_id');
    }

    public function kartuKeluarga(): BelongsTo {
        return $this->belongsTo(KartuKeluargaModel::class, 'kartu_keluarga_id', 'kartu_keluarga_id');
    }
}
