<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated as an admin
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login.form.index');
        }

        return $next($request);
    }
}
