<?php

namespace Modules\HRMS\app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
