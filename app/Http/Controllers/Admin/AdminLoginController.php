<?php

namespace App\Http\Controllers\Admin;

use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{    
    /**
     *  @login page for superadmin
     *
     * @return void
     */
    public function login()
    {
        return view('admin.auth.login');
    }
    
    /**
     * @submitLogin submit superadmin form
     *
     * @param  mixed $request
     * @return void
     */
    public function submitLogin(Request $request)
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
            return redirect()->route('dashboard')->with('success','Login successfull !');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
