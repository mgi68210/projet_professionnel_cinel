<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
// Affiche les cours que l'utilisateur a réservés
    public function index()
    {
        $utilisateur = Auth::user(); 
        $cours = $utilisateur->cours()
            ->withPivot('statut', 'date_reservation') //les infos de la réservation
            ->get();

        return view('cours.index', compact('cours'));
    }

// Affiche les détails du cours avant la réservation
    public function confirmer($id)
    {
        $cours = Cours::findOrFail($id); // Trouve le cours ou erreur 404
        return view('cours.confirmer', compact('cours'));
    }

// Enregistre une réservation pour un cours
    public function reserver($id)
    {
        $utilisateur = Auth::user(); 
        $cours = Cours::withCount('utilisateurs')->findOrFail($id); // Récupère le cours + nombre de réservations

// Vérifie si l'utilisateur a déjà réservé ce cours
        $dejaReserve = $utilisateur->cours()
            ->where('cours.id_cours', $id)
            ->exists();

        if ($dejaReserve) {
            return back()->with('error', 'Vous avez déjà réservé ce cours.');
        }

// Capacité max
        $statut = ($cours->utilisateurs_count < $cours->capacite_max)
            ? 'confirmée'
            : 'en attente';

// Enregistre la réservation
        $utilisateur->cours()->attach($id, [
            'date_reservation' => now(),
            'statut' => $statut,
        ]);

        return redirect()->route('cours.mes_reservations')
            ->with('success', "Réservation $statut.");
    }

// Affiche les réservations de l'utilisateur
    public function mesReservations()
    {
        $utilisateur = Auth::user();
        $reservations = $utilisateur->cours()
            ->withPivot('statut', 'date_reservation')
            ->get();

        return view('cours.mes_reservations', compact('reservations'));
    }

// Planning
    public function planning()
    {
        $cours = Cours::all();
        return view('cours.planning', compact('cours'));
    }

// Annule une réservation
    public function annuler($id)
    {
        $utilisateur = Auth::user();
        $utilisateur->cours()->detach($id); // Supprime la ligne dans la table pivot

        return redirect()->route('cours.mes_reservations')
            ->with('success', 'Réservation annulée.');
    }
}
