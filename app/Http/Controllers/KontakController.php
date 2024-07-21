<?php

namespace App\Http\Controllers;

use App\Models\IKNRumahTangga;
use App\Models\IKRumahTangga;
use App\Models\Kontak;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        
        $kontak = new Kontak();
        $kontak->tgl_kegiatan = $request->tanggalKegiatan;
        $kontak->nik_kontak = $request->nikKontak;
        $kontak->nama = $request->namaKontak;
        $kontak->tgl_lahir = $request->tanggalLahir;
        $kontak->jenis_kelamin = $request->jenisKelamin;
        $kontak->umur = Carbon::parse($request->tanggalLahir)->age;
        $kontak->no_telepon = $request->nomorTelepon;
        $kontak->alamat = $request->alamat;
        // $kontak->sr = $request->sr;
        // $kontak->ssr_id = $request->ssr;
        $kontak->jenis_ik = $request->jenisIk;
        $kontak->kontak_serumah = $request->kontakSerumah;
        $kontak->batuk = $request->batuk;
        $kontak->sesak_napas = $request->sesakNapas;
        $kontak->keringat_malam = $request->berkeringat;
        $kontak->demam_meriang = $request->demam;
        $kontak->dm = $request->diabetesMelitus;
        $kontak->lansia_60_thn = $request->lansia;
        $kontak->ibu_hamil = $request->ibuHamil;
        $kontak->perokok = $request->perokok;
        $kontak->berobat_tidak_tuntas = $request->pernahBerobat;
        $kontak->fasyankes_id = $request->fasyankes;
        $kontak->hasil_pemeriksaan = $request->hasilPemeriksaan;
        $kontak->tgl_revisit = $request->tanggalRevisit;
        $kontak->keterangan = $request->keterangan;
        $kontak->rujukan = 0;
        $kontak->kunjungan = 0;
        $kontak->terduga = 0;
        
        if($request->typeIk == 'ikrt'){
            $kontak->i_k_rumah_tangga_id = $id;
        }
        if($request->typeIk == 'iknrt'){
            $kontak->i_k_n_rumah_tangga_id = $id;
        }
        $kontak->save();
        session()->flash( $request->typeIk == 'ikrt' ?'ik-rumah-tangga':'ik-non-rumah-tangga', 'Data kontak berhasil ditambahkan');
        if($request->typeIk == 'ikrt'){
            return redirect('/rumah-tangga');
        }else{
            return redirect('/non-rumah-tangga');
        }
        
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

        // dd($request);
        $kontak = Kontak::find($id);
        $kontak->tgl_kegiatan = $request->tanggalKegiatan;
        $kontak->nik_kontak = $request->nikKontak;
        $kontak->nama = $request->namaKontak;
        $kontak->tgl_lahir = $request->tanggalLahir;
        $kontak->jenis_kelamin = $request->jenisKelamin;
        $kontak->umur = Carbon::parse($request->tanggalLahir)->age;
        $kontak->no_telepon = $request->nomorTelepon;
        $kontak->alamat = $request->alamat;
        // $kontak->sr = $request->sr;
        // $kontak->ssr_id = $request->ssr;
        $kontak->jenis_ik = $request->jenisIk;
        $kontak->kontak_serumah = $request->kontakSerumah;
        $kontak->batuk = $request->batuk;
        $kontak->sesak_napas = $request->sesakNapas;
        $kontak->keringat_malam = $request->berkeringat;
        $kontak->demam_meriang = $request->demam;
        $kontak->dm = $request->diabetesMelitus;
        $kontak->lansia_60_thn = $request->lansia;
        $kontak->ibu_hamil = $request->ibuHamil;
        $kontak->perokok = $request->perokok;
        $kontak->berobat_tidak_tuntas = $request->pernahBerobat;
        $kontak->fasyankes_id = $request->fasyankes;
        $kontak->hasil_pemeriksaan = $request->hasilPemeriksaan;
        $kontak->tgl_revisit = $request->tanggalRevisit;
        $kontak->keterangan = $request->keterangan;
      
        $kontak->update();
        session()->flash( $kontak->i_k_rumah_tangga ?'ik-rumah-tangga':'ik-non-rumah-tangga', 'Data kontak berhasil diperbarui');
        if($kontak->i_k_rumah_tangga){
            return redirect('/rumah-tangga');
        }else{
            return redirect('/non-rumah-tangga');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
