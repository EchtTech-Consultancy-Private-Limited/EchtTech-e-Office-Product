<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Jobseeker;
use App\Services\VerificationService;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * verifyOtp
     *
     * @param  mixed  $request
     * @return void
     */
    public function verifyOtp(Request $request)
    {
        if ($request->otp_type == 'forgot_password') {
            $message = VerificationService::otpExpireCheck($request);
            $userCheck = User::where('mobile_number', $request->mobile_number)->first();
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $userCheck->mobile_number,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            if ($message == '200') {
                $tokenUrl = route('auth.resetPassword', $token);
                return response()->json(['status' => 1, 'token' => $tokenUrl]);
            } elseif ($message == '201') {
                return response()->json(['status' => 0]);
            } elseif ($message == '401') {
                return response()->json(['status' => 2]);
            }
        } else {
            $superadmin = config('constants.roles.superadmin');
            $admin = config('constants.roles.admin');
            $employee = config('constants.roles.employee');
            $message = VerificationService::otpExpireCheck($request);
            if ($request->userRole == $employee || $request->userRole == $admin || $request->userRole == $superadmin) {
                $userData = User::whereMobileNumber($request->mobile_number)->first();
                $userDetail = [
                    'email' => $userData->email,
                    'mobile_number' => $userData->mobile_number,
                    'user_name' => $userData->user_name,
                    'userRole' => $userData->role,
                ];
            }
            if ($message == '200') {
                return response()->json(['status' => 1, 'userDetail' => $userDetail]);
            } elseif ($message == '201') {
                return response()->json(['status' => 0]);
            } elseif ($message == '401') {
                return response()->json(['status' => 2]);
            }
        }
    }

    /**
     * verify email
     *
     * @param  mixed  $request
     * @param  mixed  $email
     * @return void
     */
    public function verifyEmail(Request $request, $email)
    {
        $currentuser = User::where('email', base64_decode($email))->first();
        $data = User::where('email', base64_decode($email))->get();
        $currentuser->email_verified_at = time();
        $currentuser->update();
        /* Successfull Registration Send Email */
        Mail::to(base64_decode($email))->send(new VerifyEmail($data));

        return view('auth.email_varification');
    }
}
