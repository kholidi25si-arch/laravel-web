<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimoni extends Model
{
    protected $table = 'testimoni';

    protected $primaryKey = 'testimoni_id';

    protected $fillable = [
        'layanan_id',
        'nama_pengirim',
        'isi',
        'rating',
        'status',
    ];

    // Relasi: banyak Testimoni dimiliki oleh satu LayananKlinik
    public function layanan(): BelongsTo
    {
        return $this->belongsTo(LayananKlinik::class, 'layanan_id', 'layanan_id');
    }

    // Local scope: hanya testimoni yang ditampilkan di halaman Guest
    public function scopeTampil($query)
    {
        return $query->where('status', 'Tampil');
    }

}
