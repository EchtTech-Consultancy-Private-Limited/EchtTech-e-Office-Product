<?php

namespace Modules\HRMS\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LicenseVerification
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
