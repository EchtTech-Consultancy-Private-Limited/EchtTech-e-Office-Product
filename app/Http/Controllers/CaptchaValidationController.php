<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaValidationController extends Controller
{
    /**
     * @reloadCaptcha new captcha generate
     *
     * @return void
     */
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('math')]);
    }
}
