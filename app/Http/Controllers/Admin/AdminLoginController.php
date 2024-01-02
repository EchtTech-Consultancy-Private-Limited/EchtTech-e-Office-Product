<?php

namespace App\Http\Controllers\Admin;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
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
            'g-recaptcha-response' => ['required',function (string $attribute, mixed $value, Closure $fail) {
                $g_response =Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
                    'secret' => config('services.recaptcha.secret_key'),
                    'response' => $value,
                    'remoteip' => \request()->ip()
                ]);
//                check for captcha response
//                dd($g_response->json());
            }],
        ],
        [
            'g-recaptcha-response:required'=>"Kindly check the captcha code you have entered."
        ]);



        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.dashboard')->with('success','Login successfully !');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
