<?php

namespace App\Http\Controllers;

use App\Models\IKNRumahTangga;
use Illuminate\Http\Request;

class IknrtController extends Controller
{
    public function store(Request $request, $id){
        $iknrt = new IKNRumahTangga();
        $iknrt->i_k_rumah_tangga_id = $id;
        $iknrt->lokasi_penyuluhan = $request->lokasiPenyuluhan;
        $iknrt->tgl_penyuluhan = $request->tglPenyuluhan;
        $iknrt->waktu_penyuluhan = $request->waktuPenyuluhan;
        $iknrt->jenis_penyuluhan = $request->jenisPenyuluhan;
        $iknrt->province_id = $request->provinsi;
        $iknrt->regency_id = $request->kabupaten;
        $iknrt->district_id = $request->kecamatan;
        $iknrt->ssr_id = $request->ssr;
        $iknrt->sr = $request->sr;
        $iknrt->kader_id = $request->kader;
        $iknrt->fasyankes_id = $request->namaFasyankes;
        $iknrt->save();
        session()->flash('ik-non-rumah-tangga', 'Data IK Non Rumah Tangga berhasil ditambahkan');
        return redirect('/non-rumah-tangga');
    }
}
