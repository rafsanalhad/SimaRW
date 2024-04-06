<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoleModel extends Model
{
    protected $table = 'role';

    protected $primaryKey = 'role_id';

    protected $fillable = [
        'nama_role',
        'deskripsi_role',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(UserModel::class, 'role_id', 'role_id');
    }
}
