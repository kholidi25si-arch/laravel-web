<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * CRUD Jadwal Praktik Dokter -- menggunakan QUERY BUILDER (DB::table).
 * Berelasi dengan tabel `dokter` lewat join (jadwal_praktik.dokter_id = dokter.dokter_id).
 */
class JadwalPraktikController extends Controller
{
    private const HARI = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    private function rules(): array
    {
        return [
            'dokter_id' => 'required|integer|exists:dokter,dokter_id',
            'hari' => 'required|in:' . implode(',', self::HARI),
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'status' => 'required|in:Aktif,Nonaktif',
        ];
    }

    private function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'integer'  => ':attribute harus berupa bilangan bulat.',
            'exists'   => ':attribute tidak ditemukan.',
            'in'       => ':attribute tidak valid.',
            'date_format' => ':attribute harus berformat jam (HH:MM).',
            'after'    => ':attribute harus lebih besar dari Jam Mulai.',
        ];
    }

    private function attributes(): array
    {
        return [
            'dokter_id' => 'Dokter',
            'hari' => 'Hari',
            'jam_mulai' => 'Jam Mulai',
            'jam_selesai' => 'Jam Selesai',
            'status' => 'Status',
        ];
    }

    // Daftar dokter aktif untuk dropdown (Query Builder)
    private function dokterAktif()
    {
        return DB::table('dokter')
            ->where('status', 'Aktif')
            ->orderBy('nama_dokter')
            ->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // JOIN jadwal_praktik dengan dokter
        $data['dataJadwal'] = DB::table('jadwal_praktik')
            ->join('dokter', 'jadwal_praktik.dokter_id', '=', 'dokter.dokter_id')
            ->select(
                'jadwal_praktik.*',
                'dokter.nama_dokter',
                'dokter.spesialisasi'
            )
            ->orderBy('dokter.nama_dokter')
            ->orderByRaw(
                "CASE jadwal_praktik.hari
                    WHEN 'Senin' THEN 1 WHEN 'Selasa' THEN 2 WHEN 'Rabu' THEN 3
                    WHEN 'Kamis' THEN 4 WHEN 'Jumat' THEN 5 WHEN 'Sabtu' THEN 6
                    ELSE 7 END"
            )
            ->orderBy('jadwal_praktik.jam_mulai')
            ->get();

        return view('Admin.jadwal-praktik.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dataDokter'] = $this->dokterAktif();
        $data['daftarHari'] = self::HARI;

        return view('Admin.jadwal-praktik.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        DB::table('jadwal_praktik')->insert([
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('jadwal-praktik.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = DB::table('jadwal_praktik')->where('jadwal_id', $id)->first();
        abort_if(is_null($jadwal), 404);

        $data['dataJadwal'] = $jadwal;
        $data['dataDokter'] = $this->dokterAktif();
        $data['daftarHari'] = self::HARI;

        return view('Admin.jadwal-praktik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        $affected = DB::table('jadwal_praktik')
            ->where('jadwal_id', $id)
            ->update([
                'dokter_id' => $request->dokter_id,
                'hari' => $request->hari,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'status' => $request->status,
                'updated_at' => now(),
            ]);

        // update() mengembalikan 0 jika tidak ada perubahan; pastikan barisnya memang ada
        abort_if($affected === 0 && !DB::table('jadwal_praktik')->where('jadwal_id', $id)->exists(), 404);

        return redirect()->route('jadwal-praktik.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = DB::table('jadwal_praktik')->where('jadwal_id', $id)->delete();
        abort_if($deleted === 0, 404);

        return redirect()->route('jadwal-praktik.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
