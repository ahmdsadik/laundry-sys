<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return $next($request);
    }
}
