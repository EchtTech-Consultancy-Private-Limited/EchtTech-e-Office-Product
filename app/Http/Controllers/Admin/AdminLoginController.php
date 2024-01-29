<?php

namespace App\Http\Controllers\Admin;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json(['token' => $token, 'message' => 'Login successfully!']);
        }

        return response()->json(['message' => 'Invalid credentials. Please try again.'], 401);
    }

    // web methods

    public function loginWeb(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)){
            // Authentication successful, redirect to admin.dashboard
            return redirect()->route('admin.dashboard');
        }

        // Authentication failed, handle it accordingly (e.g., redirect back with an error message)
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
    }

}
