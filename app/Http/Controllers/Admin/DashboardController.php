<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estimation;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalEstimations = Estimation::count();
        
        return view('admin.dashboard', compact('totalUsers', 'totalEstimations'));
    }
}