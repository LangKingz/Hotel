<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Periksa apakah pengguna sedang login dan perannya adalah 'admin'
         if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika pengguna tidak memiliki peran 'admin', redirect atau abort dengan 403
        return redirect('/')->with('error', 'You do not have access to this page');
        // atau menggunakan abort(403);
        // return abort(403, 'Unauthorized action.');
    }
}
