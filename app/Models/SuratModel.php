<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratModel extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $primaryKey = 'surat_id';

    protected $fillable = [
        'user_id',
        'jenis_surat',
    ];
}
