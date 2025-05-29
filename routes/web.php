<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redirect ke index untuk semua pengguna
Route::get('/', function () {
    return redirect()->route('barangs.index');
})->name('home');

// Rute Publik
Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
Route::get('/barangs/lapor-hilang', [BarangController::class, 'createHilang'])->name('barangs.lapor-hilang');
Route::get('/barangs/lapor-temuan', [BarangController::class, 'createTemuan'])->name('barangs.lapor-temuan');
Route::get('/cari', [BarangController::class, 'cari'])->name('barangs.cari');

// Rute detail barang
Route::get('/barangs/{barang}', [BarangController::class, 'show'])
    ->where('barang', '[0-9]+')
    ->name('barangs.show');

// Rute Khusus Autentikasi
Route::middleware(['auth'])->group(function () {
    // CRUD laporan barang
    Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
    Route::get('/barangs/{barang}/edit', [BarangController::class, 'edit'])->name('barangs.edit');
    Route::put('/barangs/{barang}', [BarangController::class, 'update'])->name('barangs.update');
    Route::delete('/barangs/{barang}', [BarangController::class, 'destroy'])->name('barangs.destroy');

    // Edit laporan untuk pengguna (jika beda dari admin)
    Route::get('/edit-laporan/{barang}', [BarangController::class, 'editLaporan'])->name('barangs.edit-laporan');

    // Penanda laporan selesai
    Route::put('/barangs/{barang}/selesaikan', [BarangController::class, 'selesaikan'])->name('barangs.selesaikan');

    // Riwayat laporan user
    Route::get('/riwayat-laporan', [BarangController::class, 'riwayatLaporan'])->name('barangs.riwayat');

    // Profile user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth scaffolding (login, register, dll)
require __DIR__ . '/auth.php';
