<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        // Logika untuk halaman dashboard admin
        return view('Dashboardadmin');
    }

    public function petaniDashboard()
    {
        // Logika untuk halaman dashboard petani
        return view('Dashboardpetani');
    }
}
