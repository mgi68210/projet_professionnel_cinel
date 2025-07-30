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
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->mot_de_passe)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('accueil');
    }

// Tableau de bord admin
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
