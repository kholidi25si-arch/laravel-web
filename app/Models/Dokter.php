<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $primaryKey = 'dokter_id';

    protected $fillable = [
        'nama_dokter',
        'spesialisasi',
        'no_hp',
        'status',
    ];
}
