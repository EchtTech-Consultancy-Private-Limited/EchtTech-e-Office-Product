<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'captcha',
        ],
        [
            'captcha.captcha'=>"Kindly check the captcha code you have entered."
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.dashboard')->with('success','Login successfully !');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
