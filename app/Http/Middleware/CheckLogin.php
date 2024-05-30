<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoginMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('Dashboardadmin');
            } elseif (Auth::user()->role === 'petani') {
                return redirect()->route('Dashboardpetani');
            }
        }

        return $next($request);
    }
}
