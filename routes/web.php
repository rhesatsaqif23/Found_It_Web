<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redirect berdasarkan role saat masuk ke '/'
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('barangs.index');
    }

    return redirect()->route('barangs.index'); // Untuk guest juga ke index
})->name('home');

// Semua orang bisa akses index dan form pelaporan
Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
Route::get('/barangs/lapor-hilang', [BarangController::class, 'createHilang'])->name('barangs.lapor-hilang');
Route::get('/barangs/lapor-temuan', [BarangController::class, 'createTemuan'])->name('barangs.lapor-temuan');

Route::get('/cari', [BarangController::class, 'cari'])->name('barangs.cari');

// Rute yang mengandung parameter HARUS di bawah rute statis
Route::get('/barangs/{barang}', [BarangController::class, 'show'])
    ->where('barang', '[0-9]+') // Tambahan opsional: batasi agar hanya cocok dengan angka
    ->name('barangs.show');

// Rute yang butuh autentikasi
Route::middleware(['auth'])->group(function () {
    Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
    Route::get('/barangs/{barang}/edit', [BarangController::class, 'edit'])->name('barangs.edit');
    Route::put('/barangs/{barang}', [BarangController::class, 'update'])->name('barangs.update');
    Route::delete('/barangs/{barang}', [BarangController::class, 'destroy'])->name('barangs.destroy');
    Route::get('/riwayat-laporan', [BarangController::class, 'riwayatLaporan'])->name('barangs.riwayat');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth scaffolding (login, register, dll)
require __DIR__ . '/auth.php';
