<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;

class UtilisateurController extends Controller
{
// J'affiche le formulaire de connexion
    public function showLogin()
    {
        return view('auth.login');
    }
// Traitement de la connexion utilisateur
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $utilisateur = Utilisateur::where('email', $request->email)->first();

        if ($utilisateur && Hash::check($request->password, $utilisateur->mot_de_passe)) {
            Auth::login($utilisateur); // guard "web" utilisé par défaut
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect'])->onlyInput('email');
    }

// Pour afficher le formulaire d’inscription
    public function showRegister()
    {
        return view('auth.register');
    }

// traitement de l'inscription utiisateur
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

        Auth::login($utilisateur);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('accueil');
    }
// vue de profil utilisateur
    public function index()
    {
        $utilisateur = Auth::user();
        $coursReserves = $utilisateur->cours()->with('noter')->get();

        return view('utilisateur.dashboard', compact('utilisateur', 'coursReserves'));
    }
}
