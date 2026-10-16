<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasienHewan extends Model
{
    protected $table = 'pasien_hewan';

    protected $primaryKey = 'pasien_id';

    protected $fillable = [
        'nama_hewan',
        'jenis_hewan',
        'ras',
        'jenis_kelamin',
        'tanggal_lahir',
        'nama_pemilik',
        'no_hp_pemilik',
        'status',
    ];
}
