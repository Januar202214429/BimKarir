<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\ObatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pasien\RiwayatPeriksaController;
use App\Http\Controllers\Pasien\JanjiPeriksaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// -------------------------
// Route untuk DOKTER
// -------------------------
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {

    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');

    // Jadwal Periksa Routes
    Route::prefix('jadwal-periksa')->group(function () {
        Route::get('/', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal-periksa.index');
        Route::post('/', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal-periksa.store');
        Route::patch('/{id}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal-periksa.update');
    });

    // Obat Routes
    Route::prefix('obat')->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('dokter.obat.index');
        Route::get('/create', [ObatController::class, 'create'])->name('dokter.obat.create');
        Route::post('/', [ObatController::class, 'store'])->name('dokter.obat.store');
        Route::get('/{obat}/edit', [ObatController::class, 'edit'])->name('dokter.obat.edit');
        Route::put('/{obat}', [ObatController::class, 'update'])->name('dokter.obat.update');
        Route::delete('/{obat}', [ObatController::class, 'destroy'])->name('dokter.obat.destroy');
    });
});

// -------------------------
// Route untuk PASIEN
// -------------------------
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {

    // Dashboard Pasien
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('pasien.dashboard');

    // Riwayat Periksa Pasien
    Route::prefix('riwayat-periksa')->group(function () {
        Route::get('/', [RiwayatPeriksaController::class, 'index'])->name('pasien.riwayat-periksa.index');
        Route::get('/{id}/detail', [RiwayatPeriksaController::class, 'detail'])->name('pasien.riwayat-periksa.detail');
        Route::get('/{id}/riwayat', [RiwayatPeriksaController::class, 'riwayat'])->name('pasien.riwayat-periksa.riwayat');
    });

    // Janji Periksa Pasien
    Route::prefix('janji-periksa')->group(function () {
    Route::get('/buat', [JanjiPeriksaController::class, 'create'])->name('pasien.janji-periksa.create');
    Route::post('/', [JanjiPeriksaController::class, 'store'])->name('pasien.janji-periksa.store');
});
});

// -------------------------
// Profile (Umum)
// -------------------------
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
