<?php

namespace Modules\HRMS\app\Http\Controllers\Auth;

use App\Exceptions\GlobalException;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * @throws GlobalException
     */
    public function login(Request $request)
    {
        $userCheck = User::where('username', $request->userName)->first();

        if ($request->login == 'login_with_password') {
            $role = Role::whereName($request->password_userRole)->first();

            $credentials = [
                'mobile' => $request->password_mobile_number,
                'password' => $request->password,
                'role_id' => $role->id,
            ];

            if (Auth::attempt($credentials, $request->remember)) {
                return response()->json(['status' => 200, 'redirectUrl' => '/dashboard'], 200);
            } else {
                return response()->json(['status' => 201], 201);
            }
        }

        if ($request->login_with_otp == 'login_with_otp' && !empty($userCheck)) {
            if ($userCheck->username == $request->userName) {
                $userDetail = [
                    'email' => $userCheck->email,
                    'mobile' => $userCheck->mobile,
                    'username' => $userCheck->username,
                    'otp_type' => config('constants.otp_type.login'),
                    'userRole' => $userCheck->role->name ?? 'none',
                ];

                $userObject = (object)$userDetail;

                OtpService::sendOtp($userObject);

                return response()->json(['status' => 200, 'userDetail' => $userDetail], 200);
            }
        }

        return response()->json(402);
    }
}
