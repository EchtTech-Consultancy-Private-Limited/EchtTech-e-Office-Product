<?php

namespace Modules\HRMS\app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResendEmailVarification;
use App\Services\OtpService;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    /**
     * resendOtp
     *
     * @param  mixed  $request
     * @return void
     */
    public function resendOtp(Request $request)
    {
        OtpService::sendOtp($request);
        return 'OTP send Successfull !';
    }

}
