<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananKlinik;
use App\Models\Testimoni;
use Illuminate\Http\Request;

/**
 * CRUD Testimoni -- menggunakan ELOQUENT (Model + relasi belongsTo ke LayananKlinik).
 */
class TestimoniController extends Controller
{
    private function rules(): array
    {
        return [
            'layanan_id' => 'required|integer|exists:layanan_klinik,layanan_id',
            'nama_pengirim' => 'required|max:100',
            'isi' => 'required|max:500',
            'rating' => 'required|integer|min:1|max:5',
            'status' => 'required|in:Tampil,Sembunyi',
        ];
    }

    private function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'integer'  => ':attribute harus berupa bilangan bulat.',
            'exists'   => ':attribute tidak ditemukan.',
            'in'       => ':attribute tidak valid.',
            'max'      => ':attribute maksimal :max karakter.',
            'min'      => ':attribute minimal :min.',
        ];
    }

    private function attributes(): array
    {
        return [
            'layanan_id' => 'Layanan',
            'nama_pengirim' => 'Nama Pengirim',
            'isi' => 'Isi Testimoni',
            'rating' => 'Rating',
            'status' => 'Status',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager loading relasi layanan agar tidak terjadi N+1 query
        $data['dataTestimoni'] = Testimoni::with('layanan')->latest('testimoni_id')->get();
        return view('Admin.testimoni.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dataLayanan'] = LayananKlinik::orderBy('nama_layanan')->get();
        return view('Admin.testimoni.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        $data['layanan_id'] = $request->layanan_id;
        $data['nama_pengirim'] = $request->nama_pengirim;
        $data['isi'] = $request->isi;
        $data['rating'] = $request->rating;
        $data['status'] = $request->status;

        Testimoni::create($data);

        return redirect()->route('testimoni.index')->with('success', 'Penambahan Data Berhasil!');
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
        $data['dataTestimoni'] = Testimoni::findOrFail($id);
        $data['dataLayanan'] = LayananKlinik::orderBy('nama_layanan')->get();
        return view('Admin.testimoni.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        $dataTestimoni = Testimoni::findOrFail($id);

        $data['layanan_id'] = $request->layanan_id;
        $data['nama_pengirim'] = $request->nama_pengirim;
        $data['isi'] = $request->isi;
        $data['rating'] = $request->rating;
        $data['status'] = $request->status;

        $dataTestimoni->update($data);

        return redirect()->route('testimoni.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataTestimoni = Testimoni::findOrFail($id);
        $dataTestimoni->delete();

        return redirect()->route('testimoni.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
