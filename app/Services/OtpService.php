<?php

namespace App\Services;

use App\Exceptions\GlobalException;
use App\Models\Otp;
use App\Utility\GenerateOtp;
use Carbon\Carbon;
use Exception;

class OtpService
{
    /**
     * otpExpireCheck
     *
     * @param  mixed  $request
     * @return false
     *
     * @throws GlobalException
     */
    public static function sendOtp($request): bool
    {
        try {
            $smsOtp = GenerateOtp::otpGenerate(4);
            $expireTime = Carbon::now(env('TIME_ZONE'));

            $expireDate = strtotime($expireTime);
            $expirationTime = config('constants.sms_expired_time');
            $futureDate = $expireDate + ($expirationTime['second']);
            $formatDate = date('Y-m-d H:i:s', $futureDate);

            $completed = Otp::updateOrCreate(
                [
                    'email' => $request->email,
                    'mobile_number' => $request->mobile,
                    'status' => '0',
                    'type' => $request->otp_type,
                ],
                [
                    'email' => $request->email,
                    'mobile_number' => $request->mobile,
                    'otp' => $smsOtp,
                    'expired_at' => $formatDate,
                    'type' => $request->otp_type,
                ]
            );

            if ($completed){
                SendSmsService::sentSms($request->email, $request->mobile, $smsOtp,$request->otp_type);
                return true;
            }else{
                return false;
            }

        } catch (Exception $e) {
            throw new GlobalException($e->getMessage());
        }
    }
}
