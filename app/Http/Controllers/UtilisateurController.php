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
   // On traite la connexion
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:4',
    ]);

// Je cherche d’abord un admin avec cet email
    $admin = Admin::where('email', $request->email)->first();
    if ($admin && Hash::check($request->password, $admin->mot_de_passe)) {
        Auth::guard('admin')->login($admin); // je connecte en tant qu'admin
        return redirect()->route('admin.index');
    }

// Sinon je tente en tant qu'utilisateur normal
    $utilisateur = Utilisateur::where('email', $request->email)->first();
    if ($utilisateur && Hash::check($request->password, $utilisateur->mot_de_passe)) {
        Auth::guard('web')->login($utilisateur); // je connecte en tant qu'utilisateur
        return redirect()->route('home');
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
    $utilisateur = Auth::user();

    $coursReserves = Auth::user()->cours()->with('noter')->get();

    return view('utilisateur.dashboard', compact('utilisateur', 'coursReserves'));
}

}
