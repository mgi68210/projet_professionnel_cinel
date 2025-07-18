<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;

class UtilisateurController extends Controller
{
// vue du formulaire de connexion
    public function showLogin()
    {
        return view('auth.login_utilisateur');
    }

// traitement de la connexion
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $utilisateur = Utilisateur::where('email', $request->email)->first();

        if ($utilisateur && Hash::check($request->password, $utilisateur->mot_de_passe)) {
            Auth::guard('web')->login($utilisateur); // je stock la session ici
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect'])->onlyInput('email');
    }

// Vue du formulaire d'inscription
    public function showRegister()
    {
        return view('auth.register_utilisateur');
    }

// Je traite l'inscription
    public function register(Request $request)
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

        Auth::guard('web')->login($utilisateur);
        return redirect()->route('home');
    }

// Pour la deconnexion
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('accueil');
    }

    public function index()
    {
        return view('utilisateur.dashboard');
    }
}
