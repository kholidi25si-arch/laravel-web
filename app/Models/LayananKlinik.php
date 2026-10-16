<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananKlinik extends Model
{
    protected $table = 'layanan_klinik';

    protected $primaryKey = 'layanan_id';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga',
        'durasi_menit',
        'status',
    ];
}
