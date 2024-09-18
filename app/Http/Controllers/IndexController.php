<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $status = 'index';

        return view('index', compact('status'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required|unique:users,nik_index',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.unique' => 'NIK ini sudah terdaftar, silakan gunakan NIK yang berbeda.',
        ]);

        

        $index = new Index();
        $index->sumber_data = $request->sumberData;
        $index->type_fasyankes = $request->tipe_fasyankes;
        $index->tahun_index = $request->tahunIndex;
        $index->semester_index = $request->semesterIndex;
        $index->nama_pasien = $request->namaPasien;
        $index->nik_index = $request->nikIndex;
        $index->tanggal_lahir = $request->tanggalLahir;
        $index->jenis_kelamin = $request->jenisKelamin;
        $index->alamat = $request->alamat;
        $index->regency_id = $request->kabupaten;
        $index->district_id = $request->kecamatan;
        $index->fasyankes_id = $request->fasyankes;
        $index->ssr_id = $request->ssr;
        $index->save();
        session()->flash('index', 'Data index berhasil ditambahkan');
        return redirect('/index');
    }
    public function update(Request $request, $id)
    {
        $index = Index::find($id);
        $index->sumber_data = $request->sumberData;
        $index->type_fasyankes = $request->tipe_fasyankes;
        $index->tahun_index = $request->tahunIndex;
        $index->semester_index = $request->semesterIndex;
        $index->nama_pasien = $request->namaPasien;
        $index->nik_index = $request->nikIndex;
        $index->tanggal_lahir = $request->tanggalLahir;
        $index->jenis_kelamin = $request->jenisKelamin;
        $index->alamat = $request->alamat;
        $index->regency_id = $request->kabupaten;
        $index->district_id = $request->kecamatan;
        $index->fasyankes_id = $request->fasyankes;
        $index->ssr_id = $request->ssr;
        $index->update();
        session()->flash('index', 'Data index berhasil diperbarui');
        return redirect('/index');
    }
}
