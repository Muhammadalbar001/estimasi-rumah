<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estimation;
use Illuminate\Http\Request;

class EstimationController extends Controller
{
    // Menampilkan seluruh riwayat estimasi
    public function index()
    {
        // Mengambil data estimasi beserta relasi user penginput, urut dari yang terbaru
        $estimations = Estimation::with('user')->latest()->get();
        return view('admin.estimations.index', compact('estimations'));
    }

    // Menampilkan detail (RAB Satuan) dari satu estimasi - Ini Laporan 1 Skripsi!
    public function show(Estimation $estimation)
    {
        // Load data user agar nama pembuatnya bisa ditampilkan
        $estimation->load('user');
        return view('admin.estimations.show', compact('estimation'));
    }

    // Menghapus data estimasi jika dirasa spam/tidak valid
    public function destroy(Estimation $estimation)
    {
        $estimation->delete();
        return redirect()->route('admin.estimations.index')
                         ->with('success', 'Data estimasi berhasil dihapus dari riwayat.');
    }
}