<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        // --- Query Builder: dokter aktif + jadwal praktik (partial "team") ---
        $data['dataDokter'] = DB::table('dokter')
            ->where('status', 'Aktif')
            ->orderBy('nama_dokter')
            ->get();

        // JOIN jadwal_praktik dengan dokter, lalu dikelompokkan per dokter_id
        $data['jadwalDokter'] = DB::table('jadwal_praktik')
            ->join('dokter', 'jadwal_praktik.dokter_id', '=', 'dokter.dokter_id')
            ->where('jadwal_praktik.status', 'Aktif')
            ->where('dokter.status', 'Aktif')
            ->select('jadwal_praktik.*')
            ->orderByRaw(
                "CASE jadwal_praktik.hari
                    WHEN 'Senin' THEN 1 WHEN 'Selasa' THEN 2 WHEN 'Rabu' THEN 3
                    WHEN 'Kamis' THEN 4 WHEN 'Jumat' THEN 5 WHEN 'Sabtu' THEN 6
                    ELSE 7 END"
            )
            ->orderBy('jadwal_praktik.jam_mulai')
            ->get()
            ->groupBy('dokter_id');

        // --- Eloquent: testimoni yang ditampilkan + relasi layanan (partial "testimonial") ---
        $data['dataTestimoni'] = Testimoni::with('layanan')
            ->tampil()
            ->latest('testimoni_id')
            ->get();

        return view('Guest.home', $data);
    }
}
