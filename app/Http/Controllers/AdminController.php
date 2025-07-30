<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Cours;
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

    //Controller pour l'admin

// Formulaire d’ajout
    public function create()
    {
        return view('cours.create');
    }

// Enregistre un nouveau cours
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'date_heure' => 'required|date',
            'capacite_max' => 'required|integer',
            'tranche_age' => 'nullable|string',
        ]);

        Cours::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Cours ajouté.');
    }

// Formulaire de modification
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.edit', compact('cours'));
    }

    // Enregistre la modification
    public function update(Request $request, $id)
    {
        $cours = Cours::findOrFail($id);

        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'date_heure' => 'required|date',
            'capacite_max' => 'required|integer',
            'tranche_age' => 'nullable|string',
        ]);

        $cours->update($request->all());

        return redirect()->route('admin.index')->with('success', 'Cours modifié.');
    }

    // Suppression éventuelle si tu veux
    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();

        return redirect()->route('admin.index')->with('success', 'Cours supprimé.');
    }
}
