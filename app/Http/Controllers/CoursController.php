<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
// Controller pour un utilisateur

    // Affiche les cours réservés par l’utilisateur connecté
    public function index()
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login');
        }

        $cours = $utilisateur->cours()
            ->withPivot('statut', 'date_reservation')
            ->get();

        return view('cours.index', compact('cours'));
    }

// Page de confirmation de réservation
    public function confirmer($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.confirmer', compact('cours'));
    }

// Réserver un cours
    public function reserver($id)
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login')->withErrors([
                'email' => 'Veuillez vous connecter pour réserver.'
            ]);
        }

        $cours = Cours::withCount('utilisateurs')->findOrFail($id);

        $dejaReserve = $utilisateur->cours()
            ->where('cours.id_cours', $id)
            ->exists();

        if ($dejaReserve) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé ce cours.');
        }

        $statut = ($cours->utilisateurs_count < $cours->capacite_max) ? 'confirmée' : 'en attente';

        $utilisateur->cours()->attach($id, [
            'date_reservation' => now(),
            'statut' => $statut
        ]);

        $message = $statut === 'confirmée'
            ? 'Réservation confirmée !'
            : 'Cours complet. Vous êtes en attente.';

        return redirect()->route('cours.index')->with('success', $message);
    }

// Affiche les réservations de l’utilisateur
    public function mesReservations()
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login');
        }

        $reservations = $utilisateur->cours()
            ->withPivot('statut', 'date_reservation')
            ->get();

        return view('cours.mes_reservations', compact('reservations'));
    }

// Planning général (visible par tous)
    public function planning()
    {
        $cours = Cours::all();
        return view('cours.planning', compact('cours'));
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
