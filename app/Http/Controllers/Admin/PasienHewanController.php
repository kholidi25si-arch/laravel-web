<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PasienHewan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PasienHewanController extends Controller
{
    private function rules(): array
    {
        return [
            'nama_hewan' => 'required|max:100',
            'jenis_hewan' => ['required', Rule::in(['Kucing', 'Anjing', 'Kelinci', 'Burung', 'Hamster', 'Lainnya'])],
            'ras' => 'nullable|max:100',
            'jenis_kelamin' => ['required', Rule::in(['Jantan', 'Betina'])],
            'tanggal_lahir' => 'required|date',
            'nama_pemilik' => 'required|max:100',
            'no_hp_pemilik' => 'required|numeric',
            'status' => 'required|in:Rawat Jalan,Rawat Inap',
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
            'nama_hewan' => 'Nama Hewan',
            'jenis_hewan' => 'Jenis Hewan',
            'ras' => 'Ras',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nama_pemilik' => 'Nama Pemilik',
            'no_hp_pemilik' => 'No. HP Pemilik',
            'status' => 'Status',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPasien'] = PasienHewan::all();
        return view('Admin.pasien-hewan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pasien-hewan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        //dd($request->all());

        $data['nama_hewan'] = $request->nama_hewan;
        $data['jenis_hewan'] = $request->jenis_hewan;
        $data['ras'] = $request->ras;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['nama_pemilik'] = $request->nama_pemilik;
        $data['no_hp_pemilik'] = $request->no_hp_pemilik;
        $data['status'] = $request->status;

        PasienHewan::create($data);

        return redirect()->route('pasien-hewan.index')->with('success', 'Penambahan Data Berhasil!');
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
        $data['dataPasien'] = PasienHewan::findOrFail($id);
        return view('Admin.pasien-hewan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->rules(), $this->messages(), $this->attributes());

        $dataPasien = PasienHewan::findOrFail($id);

        $data['nama_hewan'] = $request->nama_hewan;
        $data['jenis_hewan'] = $request->jenis_hewan;
        $data['ras'] = $request->ras;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['nama_pemilik'] = $request->nama_pemilik;
        $data['no_hp_pemilik'] = $request->no_hp_pemilik;
        $data['status'] = $request->status;

        $dataPasien->update($data);

        return redirect()->route('pasien-hewan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPasien = PasienHewan::findOrFail($id);
        $dataPasien->delete();

        return redirect()->route('pasien-hewan.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
