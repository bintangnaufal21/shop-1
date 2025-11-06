<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Impor Auth
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
        // 1. Cek apakah user sudah login DAN punya role 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') {
            // 2. Jika ya, izinkan dia melanjutkan
            return $next($request);
        }

        // 3. Jika tidak (dia 'user' biasa atau tamu),
        //    usir dia kembali ke halaman utama.
        return redirect('/')->with('error', 'Anda tidak memiliki hak akses Admin.');
    }
}
