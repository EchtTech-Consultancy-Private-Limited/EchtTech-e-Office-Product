<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidationsController extends Controller
{
    public function check_email_and_username(Request $request) {
        $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', Rule::unique('users', 'username')],
        ]);

        return response()->json(['success' => true]);
    }

    public function check_company_phone_email_duplicate(Request $request) {
        $request->validate([
            'email' => ['required', 'email', Rule::unique('companies', 'company_email')],
        ]);

        return response()->json(['success' => true]);
    }
}
