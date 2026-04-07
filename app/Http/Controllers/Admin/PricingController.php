<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingRule;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    // Menampilkan daftar harga
    public function index()
    {
        // Ambil semua data aturan harga (Sederhana, Menengah, Mewah)
        $pricings = PricingRule::all();
        
        return view('admin.pricing.index', compact('pricings'));
    }

    // Menampilkan form edit untuk satu tipe rumah
    public function edit(PricingRule $pricing)
    {
        return view('admin.pricing.edit', compact('pricing'));
    }

    // Memproses pembaruan harga ke database
    public function update(Request $request, PricingRule $pricing)
    {
        // Validasi inputan admin
        $request->validate([
            'base_price_per_m2' => 'required|numeric|min:0',
            'bed_additional_cost' => 'required|numeric|min:0',
            'bath_additional_cost' => 'required|numeric|min:0',
        ]);

        // Update data
        $pricing->update([
            'base_price_per_m2' => $request->base_price_per_m2,
            'bed_additional_cost' => $request->bed_additional_cost,
            'bath_additional_cost' => $request->bath_additional_cost,
        ]);

        return redirect()->route('admin.pricing.index')
                         ->with('success', 'Harga untuk tipe rumah ' . ucfirst($pricing->house_type) . ' berhasil diperbarui!');
    }
}