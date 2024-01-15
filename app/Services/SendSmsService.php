<?php

namespace App\Services;

use App\Exceptions\GlobalException;
use Exception;
use App\Mail\OtpSend;
use Mail;
use Illuminate\Support\Facades\Log;

class SendSmsService
{
    /**
     * @sentSms
     *
     *  send sms otp on mobile
     *
     * @param  mixed  $mobile_number
     * @param  mixed  $smsOtp
     * @return void
     */
    public static function sentSms($email,$mobile_number, $smsOtp,$otpType)
    {
        try {
             Mail::to($email)->send(new OtpSend($smsOtp));
            Log::channel('otp_log')->info('Email: ' . $email . ', Mobile NUmber: ' . $mobile_number. ',OTP: ' . $smsOtp. ',Otp Type: ' . $otpType);
        } catch (Exception $e) {
            throw new GlobalException($e->getMessage());
        }
    }

}
