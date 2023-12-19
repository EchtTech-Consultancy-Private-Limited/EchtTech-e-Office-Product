<?php

namespace App\Http\Controllers\Eoffice;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('eoffice.dashboard', compact('user'));
    }
}
