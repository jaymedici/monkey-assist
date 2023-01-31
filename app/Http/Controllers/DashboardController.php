<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function home(): View
    {
        return $this->loadDashboard(auth()->user());
    }
    
    /**
     * Determine which dashboard to load based on the user's role.
     *
     * @param  User $user
     * @return View
     */
    protected function loadDashboard(User $user): View
    {
        if ($user->hasRole('Admin')) {
            return view('dashboards.admin-dashboard');
        }

        return view('dashboards.user-dashboard');
    }

}
