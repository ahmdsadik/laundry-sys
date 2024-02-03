<?php

namespace App\Http\Middleware;

use App\Enums\UserStatus;
use Closure;
use Illuminate\Http\Request;

class CheckUserStatusMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->status === UserStatus::SUSPENDED) {
            auth()->logout();
            return to_route('login')->withErrors(['check' => 'تم إيقاف هذا الحساب. تواصل مع أحد المسؤولين.']);
        }
        return $next($request);
    }
}
