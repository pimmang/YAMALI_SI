<?php

namespace App\Http\Controllers;

use App\Livewire\TbSo\Ternotifikasi\RiwayatPemantauan;
use App\Models\District;
use App\Models\HasilPengobatan;
use App\Models\Kader;
use App\Models\Kontak;
use App\Models\Pemantauan;
use App\Models\Regency;
use App\Models\Terduga;
use App\Models\Ternotifikasi;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Kader.kader', [
            'status' => 'kader',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cekKinerja(Request $request)
    {
        // dd($request);
        // dd($request);
        $namaBulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $kader = Kader::where('nik', $request->nik)->first();


        if (!$kader) {
            return view('kinerja-kader', compact('kader'));
        }
        $tahunTerlama = Kontak::min(DB::raw('YEAR(created_at)'));

        if ($request->bulan) {
            $bulanSekarang = $request->bulan;
        } else {
            $bulanSekarang = date('M');
            $datetime = DateTime::createFromFormat('M', $bulanSekarang);
            $bulanSekarang = $datetime->format('n');
        }
        if ($request->tahun) {
            $tahunSekarang = $request->tahun;
            // dd($request->tahun);
        } else {
            $tahunSekarang = date('Y');
        }



        $positif = [];
        $bergejala = [];
        $negatif = [];

        $filterKader = function ($query) use ($kader) {
            $query->whereHas('iKRumahTangga', function ($query) use ($kader) {
                $query->where('kader_id', $kader->id);
            })->orWhereHas('iKNRumahTangga', function ($query) use ($kader) {
                $query->where('kader_id', $kader->id);
            });
        };

        $pendampinganIntensif = Pemantauan::whereHas('ternotifikasi.terduga.kontak', $filterKader)->whereMonth('created_at', $bulanSekarang)->whereYear('created_at', $tahunSekarang)->where('jenis_kegiatan', 'intensif')->count();
        $pendampinganLanjutan = Pemantauan::whereHas('ternotifikasi.terduga.kontak', $filterKader)->whereMonth('created_at', $bulanSekarang)->whereYear('created_at', $tahunSekarang)->where('jenis_kegiatan', 'lanjutan')->count();

        $mingguList = ['Minggu I', 'Minggu II', 'Minggu III', 'Minggu IV', 'Minggu V', 'Minggu VI', 'Minggu VII', 'Minggu VIII', 'Bulan III', 'Bulan IV', 'Bulan V', 'Bulan VI', 'Bulan VII', 'Bulan VIII', 'Bulan IX', 'Bulan X'];
        $jumlahPendampingan = [];

        foreach ($mingguList as $minggu) {
            $jumlahPendampingan[] = Pemantauan::whereHas('ternotifikasi.terduga.kontak', $filterKader)
                ->whereMonth('created_at', $bulanSekarang)
                ->whereYear('created_at', $tahunSekarang)
                ->where('waktu_kegiatan', $minggu)
                ->count();
        }

        // dd($pendampinganIntensif, $pendampinganLanjutan);


        $sembuh = HasilPengobatan::whereHas('ternotifikasi.terduga.kontak', $filterKader)->whereMonth('created_at', $bulanSekarang)->whereYear('created_at', $tahunSekarang)->where('hasil_pengobatan', 'sembuh')->count();

        $jumlahPasien = Kontak::whereHas('terduga.ternotifikasi', function ($query) use ($tahunSekarang, $bulanSekarang) {
            $query->whereYear('created_at', $tahunSekarang)
                ->whereMonth('created_at', $bulanSekarang);
        })->where($filterKader)->count();



        $jumlahPositif = Ternotifikasi::whereHas('hasilPengobatan', function ($query) {
            $query->where('hasil_pengobatan', 'Proses Pengobatan')
                // ->orWhere('hasil_pengobatan', 'belum mulai pengobatan')
                ->orWhere('hasil_pengobatan', 'Gagal')
                ->orWhere('hasil_pengobatan', 'Belum Mulai Pengobatan');
        })->whereHas('terduga.kontak', $filterKader)
            ->whereMonth('created_at', $bulanSekarang)
            ->whereYear('created_at', $tahunSekarang)
            ->count();

        $tanggalTerakhir = Carbon::create($tahunSekarang,  $bulanSekarang)->endOfMonth()->day;
        $tanggal = [];





        for ($i = 1; $i <= $tanggalTerakhir; $i++) {
            $tanggal[] = $i;

            $positif[] = Kontak::whereHas('terduga.ternotifikasi', function ($query) use ($tahunSekarang, $bulanSekarang, $i) {
                $query->whereYear('created_at', $tahunSekarang)
                    ->whereMonth('created_at', $bulanSekarang)
                    ->whereDay('created_at', $i);
            })->where($filterKader)->count();


            $bergejala[] = Kontak::where(function ($query) {
                $query->where('batuk', 1)
                    ->orWhere('sesak_napas', 1)
                    ->orWhere('keringat_malam', 1)
                    ->orWhere('dm', 1);
            })->whereHas('terduga.ternotifikasi')
                ->where($filterKader)
                ->whereYear('created_at', $tahunSekarang)
                ->whereMonth('created_at', $bulanSekarang)
                ->whereDay('created_at', $i)->count();

            $jumlahTerduga = Terduga::whereHas('kontak', $filterKader)
                ->whereYear('created_at', $tahunSekarang)
                ->whereMonth('created_at', $bulanSekarang)
                ->whereDay('created_at', $i)->count();

            $negatif[] = $jumlahTerduga - $positif[$i - 1];
        }
        return view('kinerja-kader', compact('tahunTerlama', 'jumlahPendampingan', 'jumlahPositif', 'pendampinganIntensif', 'pendampinganLanjutan', 'jumlahPasien', 'kader', 'namaBulan', 'bulanSekarang', 'tanggal', 'positif', 'bergejala', 'negatif', 'sembuh', 'tahunSekarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nikKader' => 'required|unique:kaders,nik|max:255',
        ]);

        $kader = new Kader();
        $kader->nama = $request->namaKader;
        $kader->nik = $request->nikKader;
        $kader->nomor_telepon = $request->nomorTelepon;
        $kader->umur = $request->umur;
        $kader->jenis_kelamin = $request->jenisKelamin;
        $kader->province_id = $request->provinsi;
        $kader->regency_id = $request->kabupaten;
        $kader->district_id = $request->kecamatan;
        $kader->sr = $request->sr;
        $kader->ssr_id = $request->ssr;
        $kader->jenis = $request->jenis;
        $kader->status = $request->status;
        $kader->save();

        session()->flash('kader', 'Data kader berhasil ditambahkan');
        return redirect('/kader');
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
    public function update(Request $request, $id)
    {
        $kader = Kader::find($id);
        $kader->nama = $request->namaKader;
        $kader->nik = $request->nikKader;
        $kader->nomor_telepon = $request->nomorTelepon;
        $kader->umur = $request->umur;
        $kader->jenis_kelamin = $request->jenisKelamin;
        $kader->province_id = $request->provinsi;
        $kader->regency_id = $request->kabupaten;
        $kader->district_id = $request->kecamatan;
        $kader->sr = $request->sr;
        $kader->ssr_id = $request->ssr;
        $kader->jenis = $request->jenis;
        $kader->status = $request->status;
        $kader->update();
        session()->flash('kader', 'Data kader berhasil diperbarui');
        return redirect('/kader');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
