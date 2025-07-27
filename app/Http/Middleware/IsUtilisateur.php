<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUtilisateur
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user() instanceof \App\Models\Utilisateur) {
            return $next($request);
        }

        return redirect('/login');
    }
}



