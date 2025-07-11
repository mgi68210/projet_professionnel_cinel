<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    // Afficher tous les cours
    public function index()
    {
        $cours = Cours::all(); // Je récupère tous les cours
        return view('cours.index', compact('cours')); // Je les envoie à la vue
    }

    // Réserver un cours
    public function reserver($id)
    {
        $utilisateur = Auth::user(); // Utilisateur connecté

        if (!$utilisateur) {
            return redirect()->route('login')->withErrors([
                'email' => 'Veuillez vous connecter pour réserver.'
            ]);
        }

        $cours = Cours::withCount('utilisateurs')->findOrFail($id);

        // Est-ce que ce cours est déjà réservé par l'utilisateur ?
        $dejaReserve = $utilisateur->cours()
            ->where('cours.id_cours', $id)
            ->exists();

        if ($dejaReserve) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé ce cours.');
        }

        // Combien de personnes déjà inscrites ?
        $capaciteMax = $cours->capacite_max;
        $inscrits = $cours->utilisateurs_count;

        // Statut : confirmé si y a de la place, sinon en attente
        $statut = ($inscrits < $capaciteMax) ? 'confirmée' : 'en attente';

        // J’inscris l’utilisateur dans la table pivot "reserver"
        $utilisateur->cours()->attach($id, [
            'date_reservation' => now(),
            'statut' => $statut
        ]);

        // Message à afficher
        $message = $statut === 'confirmée'
            ? 'Réservation confirmée !'
            : 'Cours complet. Vous êtes en attente.';

        return redirect()->route('cours.index')->with('success', $message);
    }

    // Voir ses réservations
    public function mesReservations()
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login');
        }

        // Je récupère les cours réservés par l'utilisateur
        $reservations = $utilisateur->cours()
            ->withPivot('statut', 'date_reservation')
            ->get();

        return view('cours.mes_reservations', compact('reservations'));
    }

    // Voir le planning (liste globale des cours)
    public function planning()
    {
        $cours = Cours::all();
        return view('cours.planning', compact('cours'));
    }

    // Page de confirmation d’un cours (par exemple avant réservation)
    public function confirmer($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.confirmer', compact('cours'));
    }
}
