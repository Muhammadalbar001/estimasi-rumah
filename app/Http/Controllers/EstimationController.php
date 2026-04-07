<?php

namespace App\Http\Controllers;

use App\Models\Estimation;
use App\Models\PricingRule;
use App\Models\MasterMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EstimationController extends Controller
{
    // Menampilkan riwayat estimasi milik user yang sedang login
    public function index()
    {
        $estimations = Auth::user()->estimations()->latest()->get();
        return view('estimations.index', compact('estimations'));
    }

    // Menampilkan form input estimasi
    public function create()
    {
        $rules = PricingRule::all();
        return view('estimations.create', compact('rules'));
    }

    // Memproses perhitungan Rule-Based dan menyimpannya
    public function store(Request $request)
    {
        // 1. Validasi Inputan
        $request->validate([
            'project_name' => 'required|string|max:255',
            'house_type' => 'required|in:sederhana,menengah,mewah',
            'building_area' => 'required|numeric|min:10',
            'bed_count' => 'required|numeric|min:0',
            'bath_count' => 'required|numeric|min:0',
        ]);

        // 2. Ambil Aturan Harga Dasar dari Database (Rule-Based)
        $rule = PricingRule::where('house_type', $request->house_type)->first();
        
        // 3. Logika Harga: Pakai harga standar sistem ATAU harga kustom user?
        $price_per_m2 = $request->custom_price ? $request->custom_price_m2 : $rule->base_price_per_m2;
        $bed_price = $request->custom_price ? $request->custom_bed_price : $rule->bed_additional_cost;
        $bath_price = $request->custom_price ? $request->custom_bath_price : $rule->bath_additional_cost;

        // 4. Proses Kalkulasi / Perhitungan Matematis
        $base_cost = $request->building_area * $price_per_m2;
        $bed_total_cost = $request->bed_count * $bed_price;
        $bath_total_cost = $request->bath_count * $bath_price;
        
        $additional_cost = $bed_total_cost + $bath_total_cost;
        $grand_total = $base_cost + $additional_cost;

        // 5. Simpan Hasil ke Database
        $estimation = Estimation::create([
            'user_id' => Auth::id(),
            'project_name' => $request->project_name,
            'house_type' => $request->house_type,
            'building_area' => $request->building_area,
            'bed_count' => $request->bed_count,
            'bath_count' => $request->bath_count,
            'price_per_m2_used' => $price_per_m2,
            'bed_price_used' => $bed_price,
            'bath_price_used' => $bath_price,
            'total_base_cost' => $base_cost,
            'total_additional_cost' => $additional_cost,
            'grand_total' => $grand_total,
        ]);

        // 6. Arahkan ke halaman hasil (RAB)
        return redirect()->route('estimations.show', $estimation->id)
                         ->with('success', 'Estimasi berhasil dihitung!');
    }

    // Menampilkan hasil RAB satuan milik user
    public function show(Estimation $estimation)
    {
        // Pastikan user hanya bisa melihat estimasinya sendiri
        if ($estimation->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke dokumen ini.');
        }

        // Load relasi material aktual dan ambil daftar master material untuk dropdown
        $estimation->load('actualMaterials.masterMaterial');
        $masterMaterials = MasterMaterial::orderBy('name')->get();

        return view('estimations.show', compact('estimation', 'masterMaterials'));
    }
}