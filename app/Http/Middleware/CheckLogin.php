<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Jika pengguna belum masuk dan mencoba mengakses halaman selain Home atau Login
        if (!Auth::check() && !in_array($request->path(), ['/', '/login'])) {
            return redirect('/login');
        }

        return $next($request);
    }
}
