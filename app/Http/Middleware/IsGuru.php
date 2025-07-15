<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsGuru
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'guru') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Harap login sebagai guru untuk mengakses halaman ini.');
    }
}
