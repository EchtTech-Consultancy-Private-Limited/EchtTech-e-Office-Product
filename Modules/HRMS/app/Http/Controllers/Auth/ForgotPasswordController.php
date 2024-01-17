<?php

namespace Modules\HRMS\app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Models\Jobseeker;
use App\Models\User;
use App\Services\OtpService;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * forgetPassword
     *
     * @return void
     */
    public function forgetPassword()
    {
        return view('hrms::auth.forgot_password');
    }

    /**
     * checkForgotPassword
     *
     * @param  mixed $request
     * @return void
     */
    public function checkForgotPassword(Request $request)
    {
        $user = User::where('mobile', $request->email_or_phone)->orWhere('email', $request->email_or_phone)->first();
        if (empty($user)) {
            return redirect()->route('auth.forgetPassword')->with('error', 'Email address or Phone  not found.');
        } else {
            return view('hrms::auth.forgot_password', compact('user'));
        }
    }

    /**
     * submitForgetPassword
     *
     * @return void
     */
    public function submitForgetPassword(Request $request)
    {
        if ($request->login_with_otp == 'reset_with_mobile_number') {
            $userCheck = User::where('mobile_number', $request->mobile_number)->first();
            if ($userCheck->mobile_number == $request->mobile_number) {
                $userDetail = [
                    'email' => $userCheck->email,
                    'mobile_number' => $userCheck->mobile_number,
                    'otp_type' => config('constants.otp_type.forgot_password'),
                    'userRole' => $userCheck->role,
                ];
                $userObject = (object) $userDetail;
                OtpService::sendOtp($userObject);
                return response()->json(['status' => 200, 'userDetail' => $userDetail], 200);
            }
            return response()->json(402);
        } else {
            $user = User::where('email', $request->email)->first();
            if (empty($user)) {
                return response()->json(402);
            } else {
                $token = Str::random(64);
                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);
                Mail::to($user->email)->send(new ForgetPassword($token));
                $checkUser = User::whereEmail($request->email)->first();
                if (!empty($checkUser)) {
                    return response()->json(200);
                } else {
                    return response()->json(402);
                }
            }
        }
    }
}
