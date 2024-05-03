<?php

namespace App\Models;

use App\Models\RoleModel;
use App\Models\KartuKeluargaModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function umkm(): BelongsTo {
        return $this->belongsTo(UmkmModel::class);
    }

    public function rt(): hasMany {
        return $this->hasMany(UserModel::class, 'nomor_rw', 'nomor_rw');
    }
}
