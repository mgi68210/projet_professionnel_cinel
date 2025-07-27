<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    // Page pour afficher les cours réservés de l’utilisateur
    public function index()
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return redirect()->route('login');
        }

        // Je récupère les cours réservés par l’utilisateur
        $cours = $utilisateur->cours()
            ->withPivot('statut', 'date_reservation')
            ->get();

        return view('cours.index', compact('cours'));
    }

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

    public function planning()
    {
        $cours = Cours::all();
        return view('cours.planning', compact('cours'));
    }

    public function confirmer($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.confirmer', compact('cours'));
    }
}
