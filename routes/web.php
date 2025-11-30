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

    // Surat Masuk (rute eksplisit supaya edit/update jelas)
    Route::get('surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
    Route::get('surat-masuk/create', [SuratMasukController::class, 'create'])->name('surat-masuk.create');
    Route::post('surat-masuk', [SuratMasukController::class, 'store'])->name('surat-masuk.store');
    Route::get('surat-masuk/{surat}/edit', [SuratMasukController::class, 'edit'])->name('surat-masuk.edit');
    Route::put('surat-masuk/{surat}', [SuratMasukController::class, 'update'])->name('surat-masuk.update');
    Route::delete('surat-masuk/{surat}', [SuratMasukController::class, 'destroy'])->name('surat-masuk.destroy');
    Route::get('surat-masuk/{surat}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');

    // Surat Keluar (sesuai permintaan: buat di folder surat-keluar, include edit/update)
    Route::get('surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');
    Route::get('surat-keluar/create', [SuratKeluarController::class, 'create'])->name('surat-keluar.create');
    Route::post('surat-keluar', [SuratKeluarController::class, 'store'])->name('surat-keluar.store');
    Route::get('surat-keluar/{surat}/edit', [SuratKeluarController::class, 'edit'])->name('surat-keluar.edit');
    Route::put('surat-keluar/{surat}', [SuratKeluarController::class, 'update'])->name('surat-keluar.update');
    Route::delete('surat-keluar/{surat}', [SuratKeluarController::class, 'destroy'])->name('surat-keluar.destroy');
    Route::get('surat-keluar/{surat}', [SuratKeluarController::class, 'show'])->name('surat-keluar.show');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
