<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        
    }

    public function userDashboard(): View
    {
        return view('dashboards.user-dashboard');
    }
}
