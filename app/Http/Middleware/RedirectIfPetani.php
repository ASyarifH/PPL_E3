<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfPetani
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'petani') {
            return $next($request);
        }
    
        return redirect()->route('login')->with('error', 'Unauthorized.');
    }
}
