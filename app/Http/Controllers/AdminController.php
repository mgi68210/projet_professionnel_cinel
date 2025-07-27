<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Reserver;
use App\Models\Noter;

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
    $admin = Auth::guard('admin')->user();

    $reservations = Reserver::with(['utilisateur', 'cours'])->get();
    $avis = Noter::with(['utilisateur', 'cours'])->latest()->get();

    $totalReservations = $reservations->count();
    $utilisateursActifs = $reservations->groupBy('id_utilisateur')->count();
    $noteMoyenne = Noter::avg('note_satisfaction');

    return view('admin.index', compact(
        'admin',
        'reservations',
        'avis',
        'totalReservations',
        'utilisateursActifs',
        'noteMoyenne'
    ));
}

}
