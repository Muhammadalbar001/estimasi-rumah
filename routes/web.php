<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController; // <-- Tambahan import Controller Admin
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// --- ROUTE USER BIASA ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// --- ROUTE KHUSUS ADMIN ---
// Hanya bisa diakses oleh user yang sudah login ('auth') DAN rolenya adalah admin ('admin')
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    
    // Dashboard Admin: /admin/dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Master Data
    Route::get('/pricing', function() { return 'Halaman Master Harga'; })->name('pricing.index');
    Route::get('/users', function() { return 'Halaman Master User'; })->name('users.index');
    
    // Data Operasional
    Route::get('/estimations', function() { return 'Halaman Data Estimasi'; })->name('estimations.index');
    
    // Laporan (8 Laporan Skripsi)
    Route::get('/reports', function() { return 'Halaman 8 Laporan Skripsi'; })->name('reports.index');
    
    // Pengaturan
    Route::get('/settings', function() { return 'Halaman Pengaturan'; })->name('settings.index');

});

require __DIR__.'/auth.php';