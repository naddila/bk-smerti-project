<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     * [1.bk, 2.pembina osis, 3.wali kelas, 4.siswa]
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if (auth()->user() && in_array(auth()->user()->role, $role)) {
            return $next($request);
        }

        return back();
    }
}
