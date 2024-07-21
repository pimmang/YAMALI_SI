<?php

namespace App\Http\Controllers;

use App\Models\HasilPengobatan;
use App\Models\Kontak;
use App\Models\Pemantauan;
use App\Models\Terduga;
use App\Models\Ternotifikasi;
use Illuminate\Http\Request;

class TbcSoController extends Controller
{
    public function terduga(){
        $status = 'terduga';
        return view('tbc-so.terduga', compact('status'));
    }

    public function ternotifikasi(){
        $status = 'ternotifikasi';
        return view('tbc-so.ternotifikasi', compact('status'));
    }

    public function hasilPengobatan(Request $request, $id){
        // dd($request);
        $hasil = new HasilPengobatan();
        $hasil->ternotifikasi_id = $id;
        $hasil->tanggal_mulai_pendampingan = $request->tglMulaiPendampingan;
        $hasil->tanggal_mulai_pengobatan = $request->tanggalMulaiPengobatan;
        $hasil->bulan_lapor_hasil_pengobatan = $request->bulanLaporHasilPengobatan;
        $hasil->tanggal_hasil_pengobatan = $request->tglHasilPengobatan;
        $hasil->hasil_pengobatan = $request->hasilPemeriksaan;
        $hasil->save();
        session()->flash('ternotifikasi', 'data hasil pengobatan berhasil ditambahkan');
        return redirect('ternotifikasi');
    }

    public function riwayatPemantauan(Request $request, $id){
        // dd($request);
        $pemantauan = new Pemantauan();
        $pemantauan->ternotifikasi_id = $id;
        $pemantauan->tanggal_kegiatan = $request->tglKegiatan;
        $pemantauan->tahap_kegiatan = $request->tahapKegiatan;
        $pemantauan->waktu_kegiatan = $request->waktuKegiatan;
        $pemantauan->jenis_kegiatan = $request->jenisKegiatan;
        $pemantauan->kegiatan = $request->Kegiatan;
        $pemantauan->save();
        session()->flash('ternotifikasi', 'data pemantauan berhasil ditambahkan');
        return redirect('ternotifikasi');
    }

    public function ubahHasilPengobatan(Request $request, $id){
        // dd($request);
        $hasil = HasilPengobatan::find($id);
        $hasil->tanggal_mulai_pendampingan = $request->tglMulaiPendampingan;
        $hasil->tanggal_mulai_pengobatan = $request->tanggalMulaiPengobatan;
        $hasil->bulan_lapor_hasil_pengobatan = $request->bulanLaporHasilPengobatan;
        $hasil->tanggal_hasil_pengobatan = $request->tglHasilPengobatan;
        $hasil->hasil_pengobatan = $request->hasilPemeriksaan;
        $hasil->update();
        session()->flash('ternotifikasi', 'data hasil pengobatan berhasil diperbarui');
        return redirect('ternotifikasi');
    }
    public function storeTerduga( Request $request,$id){
        $kontak = Kontak::find($id);
        if($request->namaFasyankes != $kontak->fasyankes_id){
            $kontak->fasyankes_id = $request->namaFasyankes;
        }

        $terduga = new Terduga();
        $terduga->mulai_kembali_berobat = $request->mulaiKembaliBerobat;
        // if($request->jenisIKRT){
        //     $terduga->kegiatan_ik = $request->jenisIKRT;
        // }if($request->jenisPenyuluhan){
        //     $terduga->jenis_penyuluhan = $request->jenisPenyuluhan;
        // }
        $terduga->nama_petugas_tbc = $request->namaPetugasTbc;
        $terduga->no_telepon_petugas_tbc = $request->noTeleponPetugas;
        $terduga->tgl_hasil_pemeriksaan_dahak = $request->tglHasilPemeriksaanDahak;
        $terduga->covid_19 = $request->covid;
        $terduga->tipe_pemeriksaan = $request->tipePemeriksaan;
        $terduga->kontak_id = $id;
        $terduga->save();
        $kontak->terduga = 1;
        $kontak->update();

        if($request->tipePemeriksaan == 'BTA +' || $request->tipePemeriksaan == 'CXR +' || $request->tipePemeriksaan == 'Extra Paru' || $request->tipePemeriksaan == 'Rontgen +' || $request->tipePemeriksaan == 'TCM +'){
            $ternotifikasi = new Ternotifikasi();
         
            $ternotifikasi->nama_petugas_pkm = $request->namaPetugasPKM;
            $ternotifikasi->tgl_verifikasi = $request->tglVerifikasi;
            $ternotifikasi->nama_pmo = $request->namaPMO;
            $ternotifikasi->no_telepon_pmo = $request->noTeleponPMO;
            $ternotifikasi->tipe_pmo = $request->tipePMO;
            $ternotifikasi->terduga_id = $terduga->id;
            $ternotifikasi->edukasi_hiv = $request->edukasiHIV;
            if($request->catatan){
                $ternotifikasi->catatan = $request->catatan;
            }
            $ternotifikasi->save();
            session()->flash('ternotifikasi', 'data ternotifikasi berhasil ditambahkan');
            return redirect('/ternotifikasi');
        }
        session()->flash('terduga', 'data terduga berhasil ditambahkan');
        return redirect('/terduga-tbc');
    }
    public function updateTerduga( Request $request,$id){
        $terduga = Terduga::find($id);
        $kontak = Kontak::find($terduga->kontak_id);
        if($request->namaFasyankes != $kontak->fasyankes_id){
            $kontak->fasyankes_id = $request->namaFasyankes;
            $kontak->update();
        }
        $terduga->mulai_kembali_berobat = $request->mulaiKembaliBerobat;
        // if($request->jenisIKRT){
        //     $terduga->kegiatan_ik = $request->jenisIKRT;
        // }if($request->jenisPenyuluhan){
        //     $terduga->jenis_penyuluhan = $request->jenisPenyuluhan;
        // }
        $terduga->nama_petugas_tbc = $request->namaPetugasTbc;
        $terduga->no_telepon_petugas_tbc = $request->noTeleponPetugas;
        $terduga->tgl_hasil_pemeriksaan_dahak = $request->tglHasilPemeriksaanDahak;
        $terduga->covid_19 = $request->covid;
        $terduga->tipe_pemeriksaan = $request->tipePemeriksaan;
        $terduga->update();
      
        if($request->tipePemeriksaan == 'BTA +' || $request->tipePemeriksaan == 'CXR +' || $request->tipePemeriksaan == 'Extra Paru' || $request->tipePemeriksaan == 'Rontgen +' || $request->tipePemeriksaan == 'TCM +'){
            if($terduga->ternotifikasi){
                $ternotifikasi = Ternotifikasi::find($terduga->ternotifikasi->id) ;
                $ternotifikasi->nama_petugas_pkm = $request->namaPetugasPKM;
                $ternotifikasi->tgl_verifikasi = $request->tglVerifikasi;
                $ternotifikasi->nama_pmo = $request->namaPMO;
                $ternotifikasi->no_telepon_pmo = $request->noTeleponPMO;
                $ternotifikasi->tipe_pmo = $request->tipePMO;
                $ternotifikasi->terduga_id = $terduga->id;
                $ternotifikasi->edukasi_hiv = $request->edukasiHIV;
                if($request->catatan){
                    $ternotifikasi->catatan = $request->catatan;
                }
                $ternotifikasi->update();
                session()->flash('ternotifikasi', 'data ternotifikasi berhasil diperbarui');
                return redirect('/ternotifikasi');
            }else{
                $ternotifikasi = new Ternotifikasi();
               
                $ternotifikasi->nama_petugas_pkm = $request->namaPetugasPKM;
                $ternotifikasi->tgl_verifikasi = $request->tglVerifikasi;
                $ternotifikasi->nama_pmo = $request->namaPMO;
                $ternotifikasi->no_telepon_pmo = $request->noTeleponPMO;
                $ternotifikasi->tipe_pmo = $request->tipePMO;
                $ternotifikasi->terduga_id = $terduga->id;
                $ternotifikasi->edukasi_hiv = $request->edukasiHIV;
                if($request->catatan){
                    $ternotifikasi->catatan = $request->catatan;
                }
                $ternotifikasi->save();
                session()->flash('ternotifikasi', 'data ternotifikasi berhasil ditambahkan');
                return redirect('/ternotifikasi');
            }
            
         
        }else{

            if($terduga->ternotifikasi){
                $ternotifkasi = Ternotifikasi::find($terduga->ternotifikasi->id);
                $ternotifkasi->delete();
            }
        }
        session()->flash('terduga', 'data terduga berhasil diperbarui');
        return redirect('/terduga-tbc');
    }

}
