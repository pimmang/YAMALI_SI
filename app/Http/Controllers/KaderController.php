<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Kader;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Kader.kader',[
            'status' => 'kader',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kabupaten = Regency::where('id',$request->kabupaten)->first();
        $kecamatan = District::where('id', $request->kecamatan)->first();
        $kader = new Kader();
        $kader->nama = $request->namaKader;
        $kader->nik = $request->nikKader;
        $kader->nomor_telepon = $request->nomorTelepon;
        $kader->umur = $request->umur;
        $kader->jenis_kelamin = $request->jenisKelamin;
        $kader->provinsi = $request->provinsi;
        $kader->kota_kabupaten = Str::title($kabupaten->name);
        $kader->kecamatan = Str::title($kecamatan->name);
        $kader->sr = $request->sr;
        $kader->ssr = $request->ssr;
        $kader->jenis = $request->jenis;
        $kader->status = $request->status;
        $kader->save();

        session()->flash('kader', 'Data kader berhasil ditambahkan');
        return view('kader.kader',[
            'status' =>'kader',
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
