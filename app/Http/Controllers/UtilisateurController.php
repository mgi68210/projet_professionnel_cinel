<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Hash;  
use App\Models\Utilisateur;      
use App\Models\Admin;                 

class UtilisateurController extends Controller
{
// J'AFFICHE LA PAGE DE CONNEXION = page commune pour utilisateur ET admin
    public function showLogin()
    {
        return view('auth.login');
    }

// On traite la connexion
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
            'role' => 'required|in:admin,utilisateur', // j'attends un "admin" ou un "utilisateur"
        ]);

// Je choisis le bon "guard" et modèle selon le rôle
        $guard = $request->role === 'admin' ? 'admin' : 'web'; // web = un utilisateur normal
        $model = $request->role === 'admin' ? Admin::class : Utilisateur::class;
        $passwordField = 'mot_de_passe'; // c’est comme ça que s’appelle le champ en base

// Je cherche l’utilisateur/ou l'admin dans la base avec son email
        $personneco = $model::where('email', $request->email)->first();

// Je vérifie le mot de passe
        if ($personneco && Hash::check($request->password, $personneco->$passwordField)) {
// Si c'est bon, je connecte l’utilisateur avec le bon guard
            Auth::guard($guard)->login($personneco);

// Je le redirige vers sa page dédiée
            return $guard === 'admin'
                ? redirect()->route('admin.index')   
                : redirect()->route('home');        
        }


        return back()->withErrors(['email' => 'Email ou mot de passe incorrect'])->onlyInput('email');
    }

// Affichage d'un formulaire d'inscription unique à l'utilisateur
    public function showRegister()
    {
        return view('auth.register');
    }

// traitement de l'inscription
    public function register(Request $request)
    {
// Je vérifie que les données sont bien remplies
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|email|unique:utilisateurs,email', 
            'password' => 'required|min:4|confirmed',             
        ]);

// Je crée un nouvel utilisateur
        $utilisateur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password), 
        ]);

// Je connecte l’utilisateur automatiquement après inscription
        Auth::guard('web')->login($utilisateur);

        return redirect()->route('home');
    }

// DECONNEXION (admin OU utilisateur)
    public function logout(Request $request)
    {
// Je vérifie d’abord qui est connecté
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();   
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();    
        }

        return redirect()->route('accueil');
    }

    //PAGE D’ACCUEIL utilisateur après connexion
    public function index()
    {
        return view('utilisateur.dashboard'); 
    }
}
