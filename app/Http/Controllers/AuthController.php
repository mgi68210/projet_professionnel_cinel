<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Utilisateur;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->mot_de_passe)) {
            Auth::login($admin);
            return redirect()->route('admin.index');
        }

        $user = Utilisateur::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->mot_de_passe)) {
            Auth::login($user);
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.'])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('accueil');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|min:4|confirmed',
        ]);

        $utilisateur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
        ]);

        Auth::login($utilisateur);
        return redirect()->route('accueil');
    }
}
