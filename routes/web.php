<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasyankesController;
use App\Http\Controllers\IknrtController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\IrtController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SsrController;
use App\Http\Controllers\TbcSoController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::post('/logout', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/verification-notice', function () {
    return view('auth.verification-notice');
})->name('verification.notice');
Route::middleware('auth')->group(function () {
    Route::get('/filter-dashboard', [DashboardController::class, 'filter'])->name('filterDashboard');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // investigasi kasus

    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/index', [IndexController::class, 'index']);
    Route::post('/tambah-index', [IndexController::class, 'store']);
    Route::post('/edit-index/{id}', [IndexController::class, 'update']);

    Route::post('/tambah-ikrt/{index}', [IrtController::class, 'store']);
    Route::post('/edit-ikrt/{id}', [IrtController::class, 'update']);
    Route::get('/rumah-tangga', function () {
        return view('IK.ik-rumah-tangga', [
            'status' => 'rumah-tangga',
        ]);
    });

    Route::get('/non-rumah-tangga', function () {
        return view('IK.ik-non-rumah-tangga', [
            'status' => 'non-rumah-tangga',
        ]);
    });
    Route::post('/tambah-iknrt/{id}', [IknrtController::class, 'store']);
    Route::post('/edit-iknrt/{id}', [IknrtController::class, 'update']);

    Route::get('/tpt-balita', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'tpt-balita',
        ]);
    });

    Route::get('/laporan/investigasi-kontak', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lInvestigasiKontak',
        ]);
    });

    Route::get('/laporan/terduga-tbc', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lTerdugaTbc',
        ]);
    });

    Route::get('/laporan/terduga-kasus-edukasi-hiv', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'terdugaKasusEdukasiHiv',
        ]);
    });

    Route::get('/laporan/tb-ro', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lTbRo',
        ]);
    });

    Route::get('/laporan/intervensi-fasyankes', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lIntervensiFasyankes',
        ]);
    });
    Route::get('/laporan/capaian-indikator', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lCapaianIndikator',
        ]);
    });
    Route::get('/laporan/halaman-muka', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lhalamanMuka',
        ]);
    });

    Route::get('/laporan/data-kader', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lDataKader',
        ]);
    });

    Route::get('/laporan/rekap-kinerja-kader', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lRekapKinerjaKader',
        ]);
    });

    Route::get('/laporan/hasil-pengobatan', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lHasilPengobatan',
        ]);
    });
    Route::get('/laporan/narasi-kegiatan', function () {
        return view('IK.ik-tpt-balita', [
            'status' => 'lNarasiKegiatan',
        ]);
    });

    Route::get('/kader', [KaderController::class, 'index']);
    Route::get('/profil', function () {
        return view('PROFIL.profil', [
            'status' => 'profil',
        ]);
    });
    Route::post('/tambah-kader', [KaderController::class, 'store']);
    Route::get('/fasyankes', [FasyankesController::class, 'index']);
    Route::post('/tambah-fasyankes', [FasyankesController::class, 'store']);

    Route::post('/edit-kader/{id}', [KaderController::class, 'update']);
    Route::post('/edit-fasyankes/{id}', [FasyankesController::class, 'update']);

    Route::post('/tambah-kontak/{id}', [KontakController::class, 'store']);
    Route::post('/edit-kontak/{id}', [KontakController::class, 'update']);

    Route::get('/terduga-tbc', [TbcSoController::class, 'terduga']);
    Route::post('/tambah-terduga/{id}', [TbcSoController::class, 'storeTerduga']);
    Route::post('/edit-terduga/{id}', [TbcSoController::class, 'updateTerduga']);

    Route::get('/ternotifikasi', [TbcSoController::class, 'ternotifikasi']);
    Route::post('/hasil-pengobatan/{id}', [TbcSoController::class, 'hasilPengobatan']);
    Route::post('/ubah-hasil-pengobatan/{id}', [TbcSoController::class, 'ubahHasilPengobatan']);
    Route::post('/riwayat-pemantauan/{id}', [TbcSoController::class, 'riwayatPemantauan']);


    Route::get('/ssr', [SsrController::class, 'index']);
});

require __DIR__ . '/auth.php';
