<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EstimationController as AdminEstimationController;
use App\Http\Controllers\EstimationController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// --- ROUTE USER BIASA ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard User: Menampilkan 5 riwayat terbaru
    Route::get('/dashboard', function () {
        $recentEstimations = auth()->user()->estimations()->latest()->take(5)->get();
        return view('dashboard', compact('recentEstimations'));
    })->name('dashboard');

    // Rute Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute Estimasi User (Buat hitungan baru & lihat riwayat sendiri)
    Route::resource('estimations', EstimationController::class)->only(['index', 'create', 'store', 'show']);

    // Rute Cetak PDF Detail RAB (Kontekstual User) -> DITAMBAHKAN DI SINI
    Route::get('/estimations/{estimation}/print', [ReportController::class, 'printDetail'])->name('estimations.print');

    // Rute untuk Material Aktual
    Route::post('/estimations/{estimation}/actual-materials', [App\Http\Controllers\ActualMaterialController::class, 'store'])->name('actual-materials.store');
    Route::delete('/actual-materials/{actualMaterial}', [App\Http\Controllers\ActualMaterialController::class, 'destroy'])->name('actual-materials.destroy');
});


// --- ROUTE KHUSUS ADMIN ---
// Hanya bisa diakses oleh user yang sudah login ('auth') DAN rolenya adalah admin ('admin')
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Master Data - Harga & Aturan (Hanya Index, Edit, Update)
    Route::resource('pricing', PricingController::class)->only(['index', 'edit', 'update']);
    
    // Master Data - Kelola Pengguna (Full CRUD)
    Route::resource('users', UserController::class);
    
    // Data Operasional - Riwayat Estimasi Keseluruhan (Hanya Lihat dan Hapus)
    Route::resource('estimations', AdminEstimationController::class)->only(['index', 'show', 'destroy']);
    
    // --- PUSAT LAPORAN & CETAK PDF ---
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    
    Route::get('/reports/print-recap', [ReportController::class, 'printRecap'])->name('reports.print.recap');
    Route::get('/reports/print-detail/{estimation}', [ReportController::class, 'printDetail'])->name('reports.print.detail');
    Route::get('/reports/print-status', [ReportController::class, 'printStatus'])->name('reports.print.status');
    
    Route::get('/reports/print-gap-analysis', [ReportController::class, 'printGapAnalysis'])->name('reports.print.gap_analysis');
    Route::get('/reports/print-extremes', [ReportController::class, 'printExtremes'])->name('reports.print.extremes');
    
    Route::get('/reports/print-house-trend', [ReportController::class, 'printHouseTrend'])->name('reports.print.house_trend');
    Route::get('/reports/print-material-popularity', [ReportController::class, 'printMaterialPopularity'])->name('reports.print.material_popularity');
    Route::get('/reports/print-price-fluctuation', [ReportController::class, 'printPriceFluctuation'])->name('reports.print.price_fluctuation');
    Route::get('/reports/print-user-activity', [ReportController::class, 'printUserActivity'])->name('reports.print.user_activity');
    
    // Pengaturan
    Route::get('/settings', function() { return 'Halaman Pengaturan'; })->name('settings.index');

});

require __DIR__.'/auth.php';