<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        foreach($roles as $role) {
            if ($role === 'admin' && $user->isAdmin) {
                return $next($request);
            } elseif ($role === 'doctor' && $user->isDoctor) {
                return $next($request);
            } elseif ($role === 'nurse' && $user->isNurse) {
                return $next($request);
            }
        }

        return redirect()->route('home')->with('error', 'Unauthorized Access');
    }
}