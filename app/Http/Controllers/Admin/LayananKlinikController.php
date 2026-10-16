<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananKlinik;
use Illuminate\Http\Request;

class LayananKlinikController extends Controller
{
    private function rules(): array
    {
        return [
            'nama_layanan' => 'required|max:100',
            'deskripsi' => 'nullable|max:500',
            'harga' => 'required|numeric|min:0',
            'durasi_menit' => 'required|integer|min:1',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
        ];
    }

    private function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'numeric'  => ':attribute harus berupa angka.',
            'integer'  => ':attribute harus berupa bilangan bulat.',
            'date'     => ':attribute harus berupa tanggal yang valid.',
            'in'       => ':attribute tidak valid.',
            'max'      => ':attribute maksimal :max karakter.',
            'min'      => ':attribute minimal :min.',
        ];
    }

    private function attributes(): array
    {
        return [
            'nama_layanan' => 'Nama Layanan',
            'deskripsi' => 'Deskripsi',
            'harga' => 'Harga (Rp)',
            'durasi_menit' => 'Durasi (menit)',
            'status' => 'Status',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataLayanan'] = LayananKlinik::all();
        return view('Admin.layanan-klinik.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.layanan-klinik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        //dd($request->all());

        $data['nama_layanan'] = $request->nama_layanan;
        $data['deskripsi'] = $request->deskripsi;
        $data['harga'] = $request->harga;
        $data['durasi_menit'] = $request->durasi_menit;
        $data['status'] = $request->status;

        LayananKlinik::create($data);

        return redirect()->route('layanan-klinik.index')->with('success', 'Penambahan Data Berhasil!');
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
        $data['dataLayanan'] = LayananKlinik::findOrFail($id);
        return view('Admin.layanan-klinik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        $dataLayanan = LayananKlinik::findOrFail($id);

        $data['nama_layanan'] = $request->nama_layanan;
        $data['deskripsi'] = $request->deskripsi;
        $data['harga'] = $request->harga;
        $data['durasi_menit'] = $request->durasi_menit;
        $data['status'] = $request->status;

        $dataLayanan->update($data);

        return redirect()->route('layanan-klinik.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataLayanan = LayananKlinik::findOrFail($id);
        $dataLayanan->delete();

        return redirect()->route('layanan-klinik.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
