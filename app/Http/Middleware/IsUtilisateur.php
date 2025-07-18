<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUtilisateur
{
    public function handle(Request $request, Closure $next)
    {
// Je vérifie que la personne est connecté via le garde "web" pour un utilisateur
        if (Auth::guard('web')->check()) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Connectez-vous comme utilisateur.');
    }
}
