<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Fasyankes;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FasyankesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Fasyankes.fasyankes',[
            'status' => 'fasyankes',
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
    
        $fasyankes = new Fasyankes();
        $fasyankes->kode_fasyankes = $request->kodeFasyankes;
        $fasyankes->nama_fasyankes = $request->namaFasyankes;
        $fasyankes->jenis = $request->jenis;
        $fasyankes->pmdt = $request->pmdt;
        $fasyankes->province_id = $request->provinsi;
        $fasyankes->regency_id = $request->kabupaten;
        $fasyankes->district_id = $request->kecamatan ;
        $fasyankes->alamat = $request->alamat;
        $fasyankes->sr = $request->sr;
        $fasyankes->ssr_id = $request->ssr;
        $fasyankes->save();
        session()->flash('fasyankes', 'Data fasyankes berhasil ditambahkan');
        return redirect('/fasyankes');
        
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
        $fasyankes = Fasyankes::find($id);
        $fasyankes->kode_fasyankes = $request->kodeFasyankes;
        $fasyankes->nama_fasyankes = $request->namaFasyankes;
        $fasyankes->jenis = $request->jenis;
        $fasyankes->pmdt = $request->pmdt;
        $fasyankes->province_id = $request->provinsi;
        $fasyankes->regency_id = $request->kabupaten;
        $fasyankes->district_id = $request->kecamatan ;
        $fasyankes->alamat = $request->alamat;
        $fasyankes->sr = $request->sr;
        $fasyankes->ssr_id = $request->ssr;
        $fasyankes->update();
        session()->flash('fasyankes', 'Data fasyankes berhasil diperbarui');
        return redirect('/fasyankes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
