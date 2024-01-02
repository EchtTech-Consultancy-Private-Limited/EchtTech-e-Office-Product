<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class LogOutController extends Controller
{
    // Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(url('/admin/login'));
    }
}
