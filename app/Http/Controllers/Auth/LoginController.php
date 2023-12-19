<?php

namespace App\Http\Controllers\Auth;

use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * login
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * empCheck
     *
     * @param  mixed  $request
     * @return void
     */
    public function login(Request $request)
    {
        $request->validate([
            'captcha' => 'captcha',
        ],
        [
            'captcha.captcha'=>"Kindly check the captcha code you have entered."
        ]);
        $userCheck = User::where('user_name', $request->userName)->first();
        if ($request->login == 'login_with_password') {
            if (Auth::attempt(['mobile_number' => $request->password_mobile_number, 'password' => $request->password, 'role' => $request->password_userRole], $request->remember)) {
                return response()->json(['status' => 200,'redirectUrl' => '/dashboard'], 200);
            }else{
                return response()->json(['status' => 201], 201);
            }
        }
        if ($request->login_with_otp == 'login_with_otp') {
            if (!empty($userCheck)) {
                if ($userCheck->user_name == $request->userName) {
                    $userDetail = [
                        'email' => $userCheck->email,
                        'mobile_number' => $userCheck->mobile_number,
                        'user_name' => $userCheck->user_name,
                        'otp_type' => config('constants.otp_type.login'),
                        'userRole' => $userCheck->role,
                    ];
                    $userObject = (object) $userDetail;
                    OtpService::sendOtp($userObject);
                    return response()->json(['status' => 200, 'userDetail' => $userDetail], 200);
                }
            }
            return response()->json(402);
        }
    }
}
