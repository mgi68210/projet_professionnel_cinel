<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
// vue du formulaire de connexion
public function showLogin()
{
    return view('auth.login', ['role' => 'admin']);
}


// Je Traite la connexion
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->mot_de_passe)) {
            Auth::guard('admin')->login($admin);// stock la session ici
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect'])->onlyInput('email');
    }

// Fonction de déconnexion
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('accueil');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
