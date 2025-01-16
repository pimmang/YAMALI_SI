<?php

namespace App\Http\Controllers;

use App\Models\Index;
use App\Models\Kontak;
use App\Models\Ssr;
use App\Models\Ternotifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SigController extends Controller
{
    public function index()
    {
        if (Index::get()->isEmpty()) {
            $kosong = true;
            $status = 'sig';
            return view('sig', compact('kosong', 'status'));
        }
        $kosong = false;

        if (Auth::user()->hasRole("ssr")) {
            $ssr = Ssr::where('nama', Auth::user()->name)->first();
            $ssrPilihan = $ssr->id;
            $tahun = "semua";
            // dd($ssrPilihan);
        } else {
            $ssrPilihan = "semua";
            $tahun = "semua";
        }
        $status = 'sig';



        $ternotifikasi = Kontak::whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi');
        })->where(function ($query) use ($ssrPilihan) {
            $query->where(function ($query) use ($ssrPilihan) {
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
            });
        })->get();



        // $ternotifikasi = $kontak->toJson();


        return view('sig', compact('status', 'kosong', 'ternotifikasi', 'ssrPilihan', 'tahun'));
    }

    public function filter(Request $request)
    {
        if (Index::get()->isEmpty()) {
            $kosong = true;
            $status = 'sig';
            return view('sig', compact('kosong', 'status'));
        }
        $kosong = false;
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


        return view('sig', compact('kosong', 'status', 'ternotifikasi', 'ssrPilihan', 'tahun', 'tahunTerlama'));
    }
}
