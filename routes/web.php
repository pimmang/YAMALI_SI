<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestigasiKasusController;
use App\Http\Controllers\IrtController;
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
    // Route::get('/tpt-balita', [IrtController::class, 'tptBalita']);
});

require __DIR__.'/auth.php';
