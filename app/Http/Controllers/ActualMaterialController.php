<?php

namespace App\Http\Controllers;

use App\Models\ActualMaterial;
use App\Models\Estimation;
use Illuminate\Http\Request;

class ActualMaterialController extends Controller
{
    // Fungsi untuk menyimpan material aktual ke database
    public function store(Request $request, Estimation $estimation)
    {
        // Validasi input
        $request->validate([
            'master_material_id' => 'required|exists:master_materials,id',
            'qty' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        // Hitung subtotal: (Harga x Qty) - Diskon
        $discount = $request->discount ?? 0;
        $subtotal = ($request->qty * $request->price) - $discount;

        // Cegah nilai minus jika diskon lebih besar dari harga
        if ($subtotal < 0) {
            $subtotal = 0;
        }

        // Simpan ke database
        ActualMaterial::create([
            'estimation_id' => $estimation->id,
            'master_material_id' => $request->master_material_id,
            'qty' => $request->qty,
            'price' => $request->price,
            'discount' => $discount,
            'subtotal' => $subtotal,
        ]);

        // Otomatisasi: Ubah status menjadi 'pembangunan' karena user sudah mulai belanja
        if ($estimation->status === 'perencanaan') {
            $estimation->update(['status' => 'pembangunan']);
        }

        return back()->with('success', 'Material aktual berhasil ditambahkan!');
    }

    // Fungsi untuk menghapus material aktual
    public function destroy(ActualMaterial $actualMaterial)
    {
        // Pastikan material yang dihapus adalah milik user yang sedang login
        if ($actualMaterial->estimation->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak.');
        }

        $actualMaterial->delete();
        return back()->with('success', 'Material aktual berhasil dihapus.');
    }
}