<?php

use App\Http\Controllers\FasyankesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkController;
use App\Http\Controllers\InvestigasiKasusController;
use App\Http\Controllers\IrtController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::post('/logout', [ProfileController::class, 'edit'])->name('profile.edit');

Route::middleware('auth')->group(function () {

       
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // investigasi kasus
    
    Route::get('/', [HomeController::class, 'index']);
    Route::post('/ik-rumah-tangga', [IkController::class, 'ikRumahTanggaCreate']);
    Route::get('/rumah-tangga', function () {
        return view('IK.ik-rumah-tangga',[
            'status' => 'rumah-tangga',
        ]);
    });
    Route::get('/non-rumah-tangga', function () {
        return view('IK.ik-non-rumah-tangga',[
            'status' => 'non-rumah-tangga',
        ]);
    });
    Route::get('/tpt-balita', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'tpt-balita',
        ]);
    });

    Route::get('/laporan/investigasi-kontak', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lInvestigasiKontak',
        ]);
    });

    Route::get('/laporan/terduga-tbc', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lTerdugaTbc',
        ]);
    });

    Route::get('/laporan/terduga-kasus-edukasi-hiv', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'terdugaKasusEdukasiHiv',
        ]);
    });

    Route::get('/laporan/tb-ro', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lTbRo',
        ]);
    });

    Route::get('/laporan/intervensi-fasyankes', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lIntervensiFasyankes',
        ]);
    });
    Route::get('/laporan/capaian-indikator', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lCapaianIndikator',
        ]);
    });
    Route::get('/laporan/halaman-muka', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lhalamanMuka',
        ]);
    });

    Route::get('/laporan/data-kader', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lDataKader',
        ]);
    });

    Route::get('/laporan/rekap-kinerja-kader', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lRekapKinerjaKader',
        ]);
    });

    Route::get('/laporan/hasil-pengobatan', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lHasilPengobatan',
        ]);
    });
    Route::get('/laporan/narasi-kegiatan', function () {
        return view('IK.ik-tpt-balita',[
            'status' => 'lNarasiKegiatan',
        ]);
    });

    Route::get('/kader', [KaderController::class, 'index']);
    Route::post('/tambah-kader', [KaderController::class, 'store']);
    Route::get('/fasyankes', [FasyankesController::class, 'index']);
    Route::post('/tambah-fasyankes', [FasyankesController::class, 'store']);
    
    // Route::get('/tpt-balita', [IrtController::class, 'tptBalita']);
});

require __DIR__.'/auth.php';
