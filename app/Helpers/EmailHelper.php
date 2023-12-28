<?php

namespace App\Helpers;

use App\Mail\Admin\Emails\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailHelper
{
    public static function sendWelcomeEmail($emailData){
        Mail::to($emailData['email'])->send(new WelcomeMail($emailData));
    }
}
