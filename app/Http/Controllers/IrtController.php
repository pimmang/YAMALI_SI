<?php

namespace App\Http\Controllers;

use App\Models\IKRumahTangga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IrtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = 'rumah-tangga';
        return view('IKRT.ik-rumah-tangga',compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $irt = new IKRumahTangga();
        $irt->sumber_data = $request->sumberData;
        $irt->type_fasyankes = $request->fasyankes ;
        $irt->tahun_index = $request->tahunIndex ;
        $irt->semester_index = $request->semesterIndex ;
        if($request->kegiatanIk){
            $irt->kegiatan_ik = $request->kegiatanIk ;
        }
        $irt->nama_pasien = $request->namaPasien;
        $irt->no_terduga = $request->nomorTerduga ;
        $irt->nik_index = $request->nikIndex ;
        $irt->tanggal_lahir = $request->tanggalLahir ;
        $irt->jenis_kelamin = $request->jenisKelamin ;
        $irt->umur = Carbon::parse($request->tanggalLahir)->age; ;
        $irt->alamat = $request->alamat ;
        $irt->province_id = $request->provinsi ;
        $irt->regency_id = $request->kabupaten ;
        $irt->district_id = $request->kecamatan ;
        $irt->sr = $request->sr ;
        $irt->ssr_id = $request->ssr ;
        $irt->fasyankes_id = $request->namaFasyankes;
        $irt->kader_id = $request->kader ;
        $irt->save();
        session()->flash('ik-rumah-tangga', 'Data IK Rumah Tangga berhasil ditambahkan');
        return redirect('/rumah-tangga');
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
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $irt = IKRumahTangga::find($id);
        $irt->sumber_data = $request->sumberData;
        $irt->type_fasyankes = $request->fasyankes ;
        $irt->tahun_index = $request->tahunIndex ;
        $irt->semester_index = $request->semesterIndex ;
        if($request->kegiatanIk){
            $irt->kegiatan_ik = $request->kegiatanIk ;
        }
        $irt->nama_pasien = $request->namaPasien;
        $irt->no_terduga = $request->nomorTerduga ;
        $irt->nik_index = $request->nikIndex ;
        $irt->tanggal_lahir = $request->tanggalLahir ;
        $irt->jenis_kelamin = $request->jenisKelamin ;
        $irt->umur = Carbon::parse($request->tanggalLahir)->age; ;
        $irt->alamat = $request->alamat ;
        $irt->province_id = $request->provinsi ;
        $irt->regency_id = $request->kabupaten ;
        $irt->district_id = $request->kecamatan ;
        $irt->sr = $request->sr ;
        $irt->ssr_id = $request->ssr ;
        $irt->fasyankes_id = $request->namaFasyankes;
        $irt->kader_id = $request->kader ;
        $irt->update();
        session()->flash('ik-rumah-tangga', 'Data IK Rumah Tangga berhasil diperbarui');
        return redirect('/rumah-tangga');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
