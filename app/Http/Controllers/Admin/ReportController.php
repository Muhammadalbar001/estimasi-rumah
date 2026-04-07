<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estimation;
use App\Models\ActualMaterial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    // Halaman Pusat Laporan
    public function index()
    {
        return view('admin.reports.index');
    }

    // --- KATEGORI A: OPERASIONAL PROYEK ---

    // 1. Laporan Rekapitulasi Proyek
    public function printRecap()
    {
        $estimations = Estimation::with('user')->latest()->get();
        $pdf = Pdf::loadView('admin.reports.pdf.recap', compact('estimations'))->setPaper('a4', 'landscape');
        return $pdf->stream('Lap_Rekap_Proyek.pdf');
    }

    // 2. Laporan Detail RAB (Kontekstual per Proyek)
    public function printDetail(Estimation $estimation)
    {
        // Load data relasi yang dibutuhkan
        $estimation->load('actualMaterials.masterMaterial', 'user');
        
        // PERBAIKAN: Arahkan ke file PDF khusus detail, bukan ke halaman UI User
        $pdf = Pdf::loadView('admin.reports.pdf.detail', compact('estimation'))->setPaper('a4', 'portrait'); 
        
        return $pdf->stream('RAB_'.$estimation->project_name.'.pdf');
    }

    // 3. Laporan Pemantauan Status Proyek
    public function printStatus()
    {
        // Mengelompokkan berdasarkan status
        $estimations = Estimation::select('status', DB::raw('count(*) as total'), DB::raw('sum(grand_total) as total_budget'))
                                 ->groupBy('status')->get();
        $details = Estimation::with('user')->orderBy('status')->get();
        
        $pdf = Pdf::loadView('admin.reports.pdf.status', compact('estimations', 'details'))->setPaper('a4', 'portrait');
        return $pdf->stream('Lap_Status_Proyek.pdf');
    }

    // --- KATEGORI B: ANALISIS KEUANGAN ---

    // 4. Laporan Analisis Komparasi (Gap Analysis)
    public function printGapAnalysis()
    {
        // Hanya ambil proyek yang sudah masuk tahap pembangunan atau selesai
        $estimations = Estimation::whereIn('status', ['pembangunan', 'selesai'])
                                 ->with('actualMaterials')
                                 ->get();
        
        $pdf = Pdf::loadView('admin.reports.pdf.gap_analysis', compact('estimations'))->setPaper('a4', 'landscape');
        return $pdf->stream('Lap_Gap_Analysis.pdf');
    }

    // 5. Laporan Anggaran Tertinggi & Terendah
    public function printExtremes()
    {
        $highest = Estimation::with('user')->orderBy('grand_total', 'desc')->take(5)->get();
        $lowest = Estimation::with('user')->orderBy('grand_total', 'asc')->take(5)->get();
        
        $pdf = Pdf::loadView('admin.reports.pdf.extremes', compact('highest', 'lowest'))->setPaper('a4', 'portrait');
        return $pdf->stream('Lap_Anggaran_Ekstrem.pdf');
    }

    // --- KATEGORI C: STATISTIK & ANALITIK ---

    // 6. Laporan Tren Tipe Rumah
    public function printHouseTrend()
    {
        $trends = Estimation::select('house_type', DB::raw('count(*) as total'))
                            ->groupBy('house_type')->get();
        $pdf = Pdf::loadView('admin.reports.pdf.house_trend', compact('trends'))->setPaper('a4', 'portrait');
        return $pdf->stream('Lap_Tren_Rumah.pdf');
    }

    // 7. Laporan Popularitas Material
    public function printMaterialPopularity()
    {
        $materials = ActualMaterial::with('masterMaterial')
                        ->select('master_material_id', DB::raw('sum(qty) as total_qty'), DB::raw('sum(subtotal) as total_spent'))
                        ->groupBy('master_material_id')
                        ->orderByDesc('total_qty')
                        ->get();
                        
        $pdf = Pdf::loadView('admin.reports.pdf.material_popularity', compact('materials'))->setPaper('a4', 'portrait');
        return $pdf->stream('Lap_Popularitas_Material.pdf');
    }

    // 8. Laporan Fluktuasi Harga Material
    public function printPriceFluctuation()
    {
        $fluctuations = ActualMaterial::with('masterMaterial')
                        ->select('master_material_id', DB::raw('min(price) as min_price'), DB::raw('max(price) as max_price'), DB::raw('avg(price) as avg_price'))
                        ->groupBy('master_material_id')
                        ->get();
                        
        $pdf = Pdf::loadView('admin.reports.pdf.price_fluctuation', compact('fluctuations'))->setPaper('a4', 'landscape');
        return $pdf->stream('Lap_Fluktuasi_Harga.pdf');
    }

    // 9. Laporan Kinerja Pengguna
    public function printUserActivity()
    {
        // Ambil data user beserta jumlah proyek dan total uang yang diestimasi
        $users = User::withCount('estimations')
                     ->withSum('estimations', 'grand_total')
                     ->orderByDesc('estimations_count')
                     ->get();
                     
        $pdf = Pdf::loadView('admin.reports.pdf.user_activity', compact('users'))->setPaper('a4', 'portrait');
        return $pdf->stream('Lap_Kinerja_User.pdf');
    }
}