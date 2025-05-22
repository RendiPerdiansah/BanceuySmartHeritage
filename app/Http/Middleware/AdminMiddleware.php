<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('akun')->user();

        if ($user && $user->level == 1) {
            return $next($request);
        }

        return redirect('/login')->with('message', 'Akses ditolak.');
    }
}
