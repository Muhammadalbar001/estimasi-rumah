<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estimation;
use App\Models\User;
use App\Models\ActualMaterial;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik untuk Dashboard
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_estimations' => Estimation::count(),
            'total_budget' => Estimation::sum('grand_total'),
            'total_items' => ActualMaterial::count(),
            // Ambil 5 aktivitas terbaru
            'recent_estimations' => Estimation::with('user')->latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}