<?php

namespace Modules\HRMS\app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Jobseeker;
use App\Models\User;
use App\Services\VerificationService;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;

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
            $userCheck = User::where('mobile', $request->mobile)->first();            
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $userCheck->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            if ($message == '200') {
                $tokenUrl = route('auth.reset-password', $token);
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
            if ($request->role == $employee || $request->role == $admin || $request->role == $superadmin) {
                $userData = User::where('mobile',$request->mobile)->first();
                $userDetail = [
                    'email' => $userData->email,
                    'mobile' => $userData->mobile,
                    'username' => $userData->username,
                    'userRole' => $userData->role->name,
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
