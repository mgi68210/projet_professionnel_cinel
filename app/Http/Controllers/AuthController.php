<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash; // Pour encoder les mots de passe
use Illuminate\Support\Facades\Auth; // Pour se connecter automatiquement
use App\Models\Utilisateur;          


class AuthController extends Controller
{
    // Affiche connexion
    public function login()
    {
        return view('auth.login');
    }

    // Gère la connexion
    public function doLogin(Request $request)
    {
        // Email et mot de passe requis
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:4'
        ]);

        // Admin doit être trouver grâce à l'email
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->mot_de_passe)) {
            Auth::login($admin); // connexion admin
            return redirect()->route('admin.index'); // page admin
        }

        // Connexion utilisateur si pas admin
        $user = Utilisateur::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->mot_de_passe)) {
            Auth::login($user); //connexion utilisateur
            return redirect()->route('home'); // page utilisateur
        }

        // Aucune corresponsdance = erreur
        return back()->withErrors([
            'email' => 'Email ou mot de passe invalide.'
        ])->onlyInput('email');
    }

    // Déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('accueil');
    }

    // formulaire d'inscription
    public function register()
    {
        //returne la vue
        return view('auth.register');
    }

    // Enregistre l'inscription
    public function doRegister(Request $request)
    {
        // champs formulaires requis
        $request->validate([
            'nom' => 'required|string|max:50',                         
            'prenom' => 'required|string|max:50',                      
            'email' => 'required|email|unique:utilisateurs,email',   
            'password' => 'required|min:4|confirmed',                 
        ]);

        // création nouvel utilisateur dans la base de donnée projetcinel
        $utilisateur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password), // hashage du mot de passe
        ]);

        // connexion après inscription
        Auth::login($utilisateur); // démarrage de la session utilisateur

        // page d’accueil utilisateur
        return redirect()->route('accueil');
    }

}
