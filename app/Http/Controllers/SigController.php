<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Ssr;
use App\Models\Ternotifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SigController extends Controller
{
    public function index()
    {
        $status = 'sig';
        $ssrPilihan = "semua";
        $tahun = "semua";
        $ternotifikasi = Kontak::whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi');
        })->get();

        // $ternotifikasi = $kontak->toJson();


        return view('sig', compact('status', 'ternotifikasi', 'ssrPilihan', 'tahun'));
    }

    public function filter(Request $request)
    {

        // dd($request);
        $status = 'sig';
        if ($request->query('ssr') != 'semua') {
            $ssr = Ssr::where('nama', $request->query('ssr'))->first();
            $ssrPilihan = $ssr->id;
        } else {
            $ssrPilihan = $request->query('ssr');
        }

        $tahunTerlama = Kontak::min(DB::raw('YEAR(created_at)'));

        $tahun =  $request->query('tahun');
        $ternotifikasi = Kontak::where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            });
        })->whereHas('terduga', function ($query) use ($tahun) {
            $query->whereHas('ternotifikasi', function ($query) use ($tahun) {
                $query->when($tahun != 'semua', function ($query) use ($tahun) {
                    $query->whereYear('created_at', $tahun);
                });
            });
        })->get();

        // dd($ternotifikasi);



        // $ternotifikasi = $kontak->toJson();


        return view('sig', compact('status', 'ternotifikasi', 'ssrPilihan', 'tahun', 'tahunTerlama'));
    }
}
