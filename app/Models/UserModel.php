<?php

namespace App\Models;

use App\Models\RoleModel;
use App\Models\KartuKeluargaModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class UserModel extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

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
        'password',
        'gaji_user',
        'nomor_rt',
        'nomor_rw',
        'pekerjaan_user',
        'alamat_user',
        'foto_user',
        'is_first_login'
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

    public function pengaduan(): HasMany {
        return $this->hasMany(PengaduanWargaModel::class, 'user_id', 'user_id');
    }
}
