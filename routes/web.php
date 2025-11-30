<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Surat Masuk (prefix + named group)
    Route::prefix('surat-masuk')->name('surat-masuk.')->group(function () {
        Route::get('/', [SuratMasukController::class, 'index'])->name('index');
        Route::get('/create', [SuratMasukController::class, 'create'])->name('create');
        Route::post('/', [SuratMasukController::class, 'store'])->name('store');
        Route::get('/{surat}/edit', [SuratMasukController::class, 'edit'])->name('edit');
        Route::put('/{surat}', [SuratMasukController::class, 'update'])->name('update');
        Route::delete('/{surat}', [SuratMasukController::class, 'destroy'])->name('destroy');
        Route::get('/{surat}', [SuratMasukController::class, 'show'])->name('show');
    });

    // Surat Keluar (prefix + named group)
    Route::prefix('surat-keluar')->name('surat-keluar.')->group(function () {
        Route::get('/', [SuratKeluarController::class, 'index'])->name('index');
        Route::get('/create', [SuratKeluarController::class, 'create'])->name('create');
        Route::post('/', [SuratKeluarController::class, 'store'])->name('store');
        Route::get('/{surat}/edit', [SuratKeluarController::class, 'edit'])->name('edit');
        Route::put('/{surat}', [SuratKeluarController::class, 'update'])->name('update');
        Route::delete('/{surat}', [SuratKeluarController::class, 'destroy'])->name('destroy');
        Route::get('/{surat}', [SuratKeluarController::class, 'show'])->name('show');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
