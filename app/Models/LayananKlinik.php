<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // Relasi: satu LayananKlinik punya banyak Testimoni
    public function testimoni(): HasMany
    {
        return $this->hasMany(Testimoni::class, 'layanan_id', 'layanan_id');
    }
}
