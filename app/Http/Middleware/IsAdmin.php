<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
// Je vérifie que la personne est connectée via le garde "admin" pour l'admin
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Accès réservé aux administrateurs.');
    }
}
