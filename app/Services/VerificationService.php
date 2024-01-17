<?php

namespace App\Services;

use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;

class VerificationService
{
    /**
     * otpExpireCheck
     *
     * @param  mixed  $request
     * @return void
     */
    public static function otpExpireCheck($request)
    {
        $verifyOtp = $request->verify_otp;
        $user = Otp::whereMobileNumber($request->mobile)
            ->whereOtp($verifyOtp)
            ->whereStatus('0')
            ->whereType($request->otp_type)
            ->first();
        if (!empty($user)) {
            $expireTime = $user->expired_at;
            $currentDate = Carbon::now(env('TIME_ZONE'));
            if ($currentDate <= $expireTime) {
                $userArr = [
                    'status' => '1',
                ];
                Otp::whereMobileNumber($request->mobile)
                    ->whereOtp($verifyOtp)
                    ->whereStatus('0')
                    ->whereType($request->otp_type)
                    ->update($userArr);

                Otp::whereMobileNumber($request->mobile)
                    ->whereOtp($verifyOtp)
                    ->whereStatus('1')
                    ->whereType($request->otp_type)
                    ->delete();

                User::whereMobile($request->mobile)
                ->update(['is_active' => 1]);

                return '200';
            } else {
                return '401';
            }
        } else {
            return '201';
        }
    }
}
