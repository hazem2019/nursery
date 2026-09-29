<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_users' => 0,
            'active_users' => 0,
            'current_locale' => app()->getLocale(),
        ];

        return view('dashboard.index', compact('stats'));
    }
}
