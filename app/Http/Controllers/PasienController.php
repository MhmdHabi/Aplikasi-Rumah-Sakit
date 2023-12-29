<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::Paginate(5);
        $data['judul'] = 'Data-Data Pasien';
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pasien'] = new \App\Models\Pasien();
        $data['route'] = 'pasien.store';
        $data['method'] = 'POST';
        $data['tombol'] = 'SIMPAN';
        $data['judul'] = 'Tambah Pasien';
        $data['list_sp'] = [
            "---Jenis Kelamin---",
            'Laki - Laki' => 'Laki - Laki',
            'Perempuan' => 'Perempuan',
            'Lainnya' => 'Lainnya',
        ];

        return view('pasien_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate ([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien|max:10',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
        ]);
        $pasien = new \App\Models\Pasien();
        $pasien->fill($validasiData);
        $pasien->save();

        flash('Data berhasil disimpan');
        return back();
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
        $data['pasien'] = \App\Models\Dokter::findOrFail($id);
        $data['route'] = ['pasien.update', $id];
        $data['method'] = 'PUT';
        $data['tombol'] = 'UPDATE';
        $data['judul'] = 'Edit Data Pasien';
        $data['list_sp'] = [
            "---Jenis Kelamin---",
            'Laki - Laki' => 'Laki - Laki',
            'Perempuan' => 'Perempuan',
            'Lainnya' => 'Lainnya',
        ];

         return view('pasien_form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate ([
            'kode_pasien' => 'required|unique:pasiens,kode_pasien,'.$id.',id|max:10',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'alamat' => 'required',
        ]);
    
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($validasiData);
        $pasien->save();
    
        flash('Data berhasil diubah');
        return redirect()->route('pasien.index');   
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->delete();
        flash('Data berhasil dihapus');
        return back();
    }

    public function laporan()
    {
        $data ['pasien'] = \App\Models\Pasien::all();
        $data ['judul'] = 'laporan Data Pasien';
        return view('pasien_laporan', $data);
    }
}
