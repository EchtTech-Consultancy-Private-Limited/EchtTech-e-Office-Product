<?php

namespace App\Helpers;

use App\Mail\Admin\Emails\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailHelper
{
    public static function sendWelcomeEmail($emailData): void
    {
        try {
            Mail::to($emailData['email'])->send(new WelcomeMail($emailData));
            // Additional logic after sending the email (if needed)
        } catch (\Exception $e) {
            // Log or handle the exception
            \Log::error('Error sending welcome email: ' . $e->getMessage());
            // Optionally, you can throw the exception again if you want it to propagate
            // throw $e;
        }
    }
}
