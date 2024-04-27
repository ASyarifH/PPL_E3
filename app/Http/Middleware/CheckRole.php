<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if ($request->user()->role !== $role) {
            // Jika peran pengguna tidak sesuai, arahkan ke halaman yang sesuai dengan peran
            if ($request->user()->role === 'admin') {
                return redirect()->route('Dashboaradmin');
            } elseif ($request->user()->role === 'petani') {
                return redirect()->route('Dashboarpetani');
            }
        }

        return $next($request);
    }
}
