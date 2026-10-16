<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    private function rules(): array
    {
        return [
            'nama_dokter' => 'required|max:100',
            'spesialisasi' => 'required|max:100',
            'no_hp' => 'required|numeric',
            'status' => 'required|in:Aktif,Nonaktif',
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
            'nama_dokter' => 'Nama Dokter',
            'spesialisasi' => 'Spesialisasi',
            'no_hp' => 'No. HP',
            'status' => 'Status',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataDokter'] = Dokter::all();
        return view('Admin.dokter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        //dd($request->all());

        $data['nama_dokter'] = $request->nama_dokter;
        $data['spesialisasi'] = $request->spesialisasi;
        $data['no_hp'] = $request->no_hp;
        $data['status'] = $request->status;

        Dokter::create($data);

        return redirect()->route('dokter.index')->with('success', 'Penambahan Data Berhasil!');
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
        $data['dataDokter'] = Dokter::findOrFail($id);
        return view('Admin.dokter.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        $dataDokter = Dokter::findOrFail($id);

        $data['nama_dokter'] = $request->nama_dokter;
        $data['spesialisasi'] = $request->spesialisasi;
        $data['no_hp'] = $request->no_hp;
        $data['status'] = $request->status;

        $dataDokter->update($data);

        return redirect()->route('dokter.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataDokter = Dokter::findOrFail($id);
        $dataDokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
